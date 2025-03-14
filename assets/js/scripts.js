// Define a variable for the color code
const tornPaperColor = '#FF1493';

document.addEventListener('DOMContentLoaded', function() {
  // Apply the torn paper effect to all elements with the torn-paper class
  const tornPaperElements = document.querySelectorAll('.torn-paper');
  tornPaperElements.forEach(initTornPaper);
  
  // Re-apply on window resize
  window.addEventListener('resize', function() {
    tornPaperElements.forEach(initTornPaper);
  });
});

// Initialize torn paper effect for a single element
function initTornPaper(element) {
  // Clean up any previously created edges
  const oldEdges = element.querySelectorAll('.edge-top, .edge-bottom');
  oldEdges.forEach(edge => edge.remove());
  
  // Create edges
  createEdges(element);
}

// Create all edges for an element
function createEdges(element) {
  const width = element.offsetWidth;
  const height = element.offsetHeight;
  
  // Remove any existing edges to prevent duplication
  const oldEdges = element.querySelectorAll('.edge-top, .edge-right, .edge-bottom, .edge-left');
  oldEdges.forEach(edge => edge.remove());
  
  // Create SVG for top edge
  const topEdge = document.createElement('div');
  topEdge.className = 'edge-top';
  topEdge.style.position = 'absolute';
  topEdge.style.top = '-20px';
  topEdge.style.left = '0';
  topEdge.style.width = '100%';
  topEdge.style.height = '20px';
  topEdge.style.overflow = 'hidden';
  topEdge.innerHTML = createTornEdgeSVG(width, 20, 'top', element.style.backgroundColor || tornPaperColor);
  element.appendChild(topEdge);
  
  // Create SVG for right edge
  const rightEdge = document.createElement('div');
  rightEdge.className = 'edge-right';
  rightEdge.style.position = 'absolute';
  rightEdge.style.top = '0';
  rightEdge.style.right = '-20px';
  rightEdge.style.width = '20px';
  rightEdge.style.height = '100%';
  rightEdge.style.overflow = 'hidden';
  
  // Create SVG with proper height
  const rightSvg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
  rightSvg.setAttribute('width', '20');
  rightSvg.setAttribute('height', height);
  rightSvg.setAttribute('viewBox', `0 0 20 ${height}`);
  
  // Create the path element
  const rightPath = document.createElementNS('http://www.w3.org/2000/svg', 'path');
  rightPath.setAttribute('d', generateTornPath(20, height, 'right'));
  rightPath.setAttribute('fill', element.style.backgroundColor || tornPaperColor);
  
  rightSvg.appendChild(rightPath);
  rightEdge.appendChild(rightSvg);
  element.appendChild(rightEdge);
  
  // Create SVG for bottom edge
  const bottomEdge = document.createElement('div');
  bottomEdge.className = 'edge-bottom';
  bottomEdge.style.position = 'absolute';
  bottomEdge.style.bottom = '-20px';
  bottomEdge.style.left = '0';
  bottomEdge.style.width = '100%';
  bottomEdge.style.height = '20px';
  bottomEdge.style.overflow = 'hidden';
  bottomEdge.innerHTML = createTornEdgeSVG(width, 20, 'bottom', element.style.backgroundColor || tornPaperColor);
  element.appendChild(bottomEdge);
  
  // Create SVG for left edge
  const leftEdge = document.createElement('div');
  leftEdge.className = 'edge-left';
  leftEdge.style.position = 'absolute';
  leftEdge.style.top = '0';
  leftEdge.style.left = '-20px';
  leftEdge.style.width = '20px';
  leftEdge.style.height = '100%';
  leftEdge.style.overflow = 'hidden';
  
  // Create SVG with proper height
  const leftSvg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
  leftSvg.setAttribute('width', '20');
  leftSvg.setAttribute('height', height);
  leftSvg.setAttribute('viewBox', `0 0 20 ${height}`);
  
  // Create the path element
  const leftPath = document.createElementNS('http://www.w3.org/2000/svg', 'path');
  leftPath.setAttribute('d', generateTornPath(20, height, 'left'));
  leftPath.setAttribute('fill', element.style.backgroundColor || tornPaperColor);
  
  leftSvg.appendChild(leftPath);
  leftEdge.appendChild(leftSvg);
  element.appendChild(leftEdge);
}

// Create SVG for a torn edge (horizontal edges - top and bottom)
function createTornEdgeSVG(width, height, position, color) {
  const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${width} ${height}" width="${width}" height="${height}">
    <path d="${generateTornPath(width, height, position)}" fill="${color}" />
  </svg>`;
  return svg;
}

// Generate path data for a torn edge
function generateTornPath(width, height, position) {
  let path = '';
  
  // Determine the path based on position
  switch (position) {
    case 'top':
      // For top edge, we want a jagged path at the bottom
      path = `M0,${height} `;
      
      // More natural tear pattern - balance between zigzag and smooth
      const topPoints = Math.max(8, Math.floor(width / 60)); // More points than before but not too many
      
      // Add some randomized segments
      for (let i = 0; i <= topPoints; i++) {
        const x = (width / topPoints) * i;
        
        // Create varied tear depths - occasionally deeper
        let tearDepth;
        if (Math.random() < 0.3) { // Occasionally make a deeper tear
          tearDepth = height - (Math.random() * 7 + 6); // Deeper tear (6-13px)
        } else {
          tearDepth = height - (Math.random() * 4 + 3); // Normal tear (3-7px)
        }
        
        const y = tearDepth;
        
        if (i === 0) {
          path += `L${x},${y} `;
        } else {
          // Use curved segments for natural look
          // Vary control points more for natural paper tears
          const controlX = x - (width / topPoints) / 2 + (Math.random() * 10 - 5);
          const controlY = height - (Math.random() * 6 + 2);
          path += `Q${controlX},${controlY} ${x},${y} `;
        }
      }
      
      path += `L${width},${height} Z`;
      break;
      
    case 'bottom':
      // For bottom edge, we want a jagged path at the top
      path = `M0,0 `;
      
      const bottomPoints = Math.max(8, Math.floor(width / 60));
      for (let i = 0; i <= bottomPoints; i++) {
        const x = (width / bottomPoints) * i;
        
        // Create varied tear depths
        let tearDepth;
        if (Math.random() < 0.3) { // Occasionally make a deeper tear
          tearDepth = Math.random() * 7 + 6; // Deeper tear (6-13px)
        } else {
          tearDepth = Math.random() * 4 + 3; // Normal tear (3-7px)
        }
        
        const y = tearDepth;
        
        if (i === 0) {
          path += `L${x},${y} `;
        } else {
          const controlX = x - (width / bottomPoints) / 2 + (Math.random() * 10 - 5);
          const controlY = Math.random() * 6 + 2;
          path += `Q${controlX},${controlY} ${x},${y} `;
        }
      }
      
      path += `L${width},0 Z`;
      break;
      
    case 'left':
      // For left edge, we want a jagged path at the right
      path = `M${width},0 `;
      
      const leftPoints = Math.max(8, Math.floor(height / 60));
      for (let i = 0; i <= leftPoints; i++) {
        const y = (height / leftPoints) * i;
        
        // Create varied tear depths
        let tearDepth;
        if (Math.random() < 0.3) { // Occasionally make a deeper tear
          tearDepth = width - (Math.random() * 7 + 6); // Deeper tear (6-13px)
        } else {
          tearDepth = width - (Math.random() * 4 + 3); // Normal tear (3-7px)
        }
        
        const x = tearDepth;
        
        if (i === 0) {
          path += `L${x},${y} `;
        } else {
          const controlY = y - (height / leftPoints) / 2 + (Math.random() * 10 - 5);
          const controlX = width - (Math.random() * 6 + 2);
          path += `Q${controlX},${controlY} ${x},${y} `;
        }
      }
      
      path += `L${width},${height} Z`;
      break;
      
    case 'right':
      // For right edge, we want a jagged path at the left
      path = `M0,0 `;
      
      const rightPoints = Math.max(8, Math.floor(height / 60));
      for (let i = 0; i <= rightPoints; i++) {
        const y = (height / rightPoints) * i;
        
        // Create varied tear depths
        let tearDepth;
        if (Math.random() < 0.3) { // Occasionally make a deeper tear
          tearDepth = Math.random() * 7 + 6; // Deeper tear (6-13px)
        } else {
          tearDepth = Math.random() * 4 + 3; // Normal tear (3-7px)
        }
        
        const x = tearDepth;
        
        if (i === 0) {
          path += `L${x},${y} `;
        } else {
          const controlY = y - (height / rightPoints) / 2 + (Math.random() * 10 - 5);
          const controlX = Math.random() * 6 + 2;
          path += `Q${controlX},${controlY} ${x},${y} `;
        }
      }
      
      path += `L0,${height} Z`;
      break;
  }
  
  return path;
}