<?php
    // GENERAL META LOGIC
    $siteTitle = $site->meta_title()->or($site->title());
    $pageTitle = $page->meta_title()->or($page->title());
    $sep = " | "; 

    if ($page->isHomePage()) {
      $metaTitle = $siteTitle;
    } else {
      $metaTitle = $pageTitle . $sep .  $siteTitle;
    }
    
    $metaDescription = $page->meta_description()->or($site->meta_description());  
    $canonicalURL = $page->meta_canonical_url()->or($page->url());
    $date = $page->modified('Y-m-d');
    $metaKeywords = $page->meta_keywords()->or($site->meta_keywords());  
    $metaImage = $page->meta_image()->or($site->meta_image());
    
    // OPEN GRAPH LOGIC
    $ogTitle = $page->og_title()->or($pageTitle) . $sep . $siteTitle;
    $ogDescription = $page->og_description()->or($metaDescription);
    $ogImage = $page->og_image()->or($page->meta_image())->or($site->og_image())->or($site->meta_image())->toFile();
    $og_imageSettings = [ 'width' => 1200, 'height' => 630, 'quality' => 80, 'crop' => true];
    $ogSiteName = $site->title();
    $ogUrl = $page->url();
    $ogType = $page->og_type()->or($site->og_type())->or("website");
    $ogAuthors = $page->og_type_article_author();
    $ogVideo = $page->og_video();
    $ogAudio = $page->og_audio();
    $ogArticlePublished = $page->publishDate();

    // TWITTER CARD LOGIC
    $twCardType = $page->twitter_card_type()->or('summary_large_image');
    $twTitle = $page->twitter_title()->or($pageTitle) . $sep . $siteTitle;
    $twDescription = $page->twitter_description()->or($metaDescription);
    $twImage = $page->twitter_image()->or($page->meta_image())->or($site->twitter_image())->or($site->meta_image())->toFile();
    $twitter_imageSettings = [ 'width' => 1200, 'height'  => 675, 'quality' => 80, 'crop' => true ];
    $twSite = $page->twitter_site()->or($site->twitter_site());
    $twCreator = $page->twitter_creator();

    // FAVICON LOGIC
    $faviconImage = $site->favicon()->toFile()
?>

<!-- META -->
<style itemscope itemtype="https://schema.org/WebSite" itemref="schema_name schema_description schema_image"></style>
<title><?= $metaTitle ?></title>
<meta id="schema_name" itemprop="name" content="<?= $metaTitle ?>">
<meta name="description" content="<?= $metaDescription ?>">
<meta id="schema_description" itemprop="description" content="<?= $metaDescription ?>">
<meta name="keywords" content="<?= $metaKeywords ?>">
<link rel="canonical" href="<?= $canonicalURL?>" />

<?php if ($metaImage->isNotEmpty()): ?>
<meta id="schema_image" itemprop="image" content="<?= $metaImage->toFile()->url() ?>">
<?php endif; ?>
<meta name="author" content="<?= $page->meta_author()->or($site->meta_author()) ?>">
<meta name="date" content="<?= $date ?>" scheme="YYYY-MM-DD">


<!-- OPEN GRAPH -->
<meta property="og:title" content="<?= $ogTitle ?>">
<meta property="og:description" content="<?= $ogDescription ?>">

<?php if ($ogImage): ?>
<meta property="og:image" content="<?= $ogImage->thumb($og_imageSettings)->url() ?>">
<?php endif; ?>

<meta property="og:site_name" content="<?= $ogSiteName ?>">
<meta property="og:url" content="<?= $ogUrl ?>">
<meta property="og:type" content="<?= $ogType ?>">

<?php if (isset($ogDeterminer) ): ?>
<?php if ($page->og_image()->or($site->og_determiner())->isNotEmpty()): ?>
<meta property="og:determiner" content="<?= $page->og_determiner()->or($site->og_determiner())->or("auto") ?>">
<?php endif; ?>
<?php endif; ?>

<?php if ($ogAudio->isNotEmpty()): ?>
<meta property="og:audio" content="<?= $ogAudio ?>">
<?php endif; ?>

<?php if ($ogVideo->isNotEmpty()): ?>
<meta property="og:video" content="<?= $ogVideo ?>">
<?php endif; ?>


<?php if ($ogType == 'article'): ?>

<?php if ($ogArticlePublished->isNotEmpty()): ?>
<meta property="article:published_time" content="<?= $ogArticlePublished ?>">
<?php endif ?>

<meta property="article:modified_time" content="<?= $page->modified() ?>">

<?php foreach ($ogAuthors->toStructure() as $author): ?>
<meta property="article:author" content="<?= $author->url()->html() ?>">
<?php endforeach ?>

<?php if ($ogArticleSection = $page->og_type_article_section()->isNotEmpty()): ?>
<meta property="article:section" content="<?= $ogArticleSection ?>">
<?php endif ?>

<?php if ($ogArticleTags = $page->og_type_article_tag()->isNotEmpty()): ?>
<meta property="article:tag" content="<?= $ogArticleTags ?>">
<?php endif ?>

<?php endif ?>

<?php if ($kirby->language() !== null): ?>
<meta property="og:locale" content="<?= $kirby->language()->locale(LC_ALL) ?>">
<?php foreach($kirby->languages() as $language): ?>
<?php if($language !== $kirby->language()): ?>
<meta property="og:locale:alternate" content="<?= $language->locale(LC_ALL) ?>">
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>



<!-- TWITTER CARD -->
<meta name="twitter:card" content="<?= $twCardType ?>">
<meta name="twitter:title" content="<?= $twTitle ?>">
<meta name="twitter:description" content="<?= $twDescription ?>">

<?php if ($twImage): ?>
<meta name="twitter:image" content="<?= $twImage->thumb($twitter_imageSettings)->url() ?>">
<?php endif; ?>

<?php if ($twSite->isNotEmpty()): ?>
<meta name="twitter:site" content="<?= $twSite ?>">
<?php endif ?>

<?php if ($twCreator->isNotEmpty()): ?>
<meta name="twitter:creator" content="<?= $twCreator ?>">
<?php endif ?>


<!-- FAVICONS -->


<?php if ($faviconImage != null ): ?>

<?php 
$sizes = [
  'icon' => 16,
  'icon' => 32,
  'apple-touch-icon' => 180
];
?>

<?php foreach ($sizes as $rel => $size): ?>
<link rel="<?= $rel ?>" href="<?= $faviconImage->thumb(['width' => $size])->url()?>" sizes="<?= $size.'x'.$size ?>"
  <?= e ($rel == 'icon', 'type="'. $faviconImage->mime() .'"') ?>>
<?php endforeach ?>
<link rel="manifest" href="<?= $site->url() ?>/manifest.webmanifest">

<?php endif; ?>

<?php if ($site->themeColor()->isNotEmpty()): ?>
<meta name="theme-color" content="<?= $site->themeColor() ?>">
<?php endif?>