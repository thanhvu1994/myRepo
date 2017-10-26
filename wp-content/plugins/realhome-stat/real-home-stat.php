<?php
/*
Plugin Name: Real Home Stat Widget
Plugin URI: https://realhome.vn
Description: Real Home Stat Widget
Author: Thanh Vu
Version: 1.0
Author URI: http://google.com
*/

add_action( 'widgets_init', 'register_realhome_stat_widget' );
function register_realhome_stat_widget() {
    register_widget('Realhome_Stat_Widget');
}

/**
 * Tạo class Realhome_Footer Widget
 */
class Realhome_Stat_Widget extends WP_Widget {
    private $icons_font_awesome = array(
        'fa-glass'                               => 'f000',
        'fa-music'                               => 'f001',
        'fa-search'                              => 'f002',
        'fa-envelope-o'                          => 'f003',
        'fa-heart'                               => 'f004',
        'fa-star'                                => 'f005',
        'fa-star-o'                              => 'f006',
        'fa-user'                                => 'f007',
        'fa-film'                                => 'f008',
        'fa-th-large'                            => 'f009',
        'fa-th'                                  => 'f00a',
        'fa-th-list'                             => 'f00b',
        'fa-check'                               => 'f00c',
        'fa-times'                               => 'f00d',
        'fa-search-plus'                         => 'f00e',
        'fa-search-minus'                        => 'f010',
        'fa-power-off'                           => 'f011',
        'fa-signal'                              => 'f012',
        'fa-cog'                                 => 'f013',
        'fa-trash-o'                             => 'f014',
        'fa-home'                                => 'f015',
        'fa-file-o'                              => 'f016',
        'fa-clock-o'                             => 'f017',
        'fa-road'                                => 'f018',
        'fa-download'                            => 'f019',
        'fa-arrow-circle-o-down'                 => 'f01a',
        'fa-arrow-circle-o-up'                   => 'f01b',
        'fa-inbox'                               => 'f01c',
        'fa-play-circle-o'                       => 'f01d',
        'fa-repeat'                              => 'f01e',
        'fa-refresh'                             => 'f021',
        'fa-list-alt'                            => 'f022',
        'fa-lock'                                => 'f023',
        'fa-flag'                                => 'f024',
        'fa-headphones'                          => 'f025',
        'fa-volume-off'                          => 'f026',
        'fa-volume-down'                         => 'f027',
        'fa-volume-up'                           => 'f028',
        'fa-qrcode'                              => 'f029',
        'fa-barcode'                             => 'f02a',
        'fa-tag'                                 => 'f02b',
        'fa-tags'                                => 'f02c',
        'fa-book'                                => 'f02d',
        'fa-bookmark'                            => 'f02e',
        'fa-print'                               => 'f02f',
        'fa-camera'                              => 'f030',
        'fa-font'                                => 'f031',
        'fa-bold'                                => 'f032',
        'fa-italic'                              => 'f033',
        'fa-text-height'                         => 'f034',
        'fa-text-width'                          => 'f035',
        'fa-align-left'                          => 'f036',
        'fa-align-center'                        => 'f037',
        'fa-align-right'                         => 'f038',
        'fa-align-justify'                       => 'f039',
        'fa-list'                                => 'f03a',
        'fa-outdent'                             => 'f03b',
        'fa-indent'                              => 'f03c',
        'fa-video-camera'                        => 'f03d',
        'fa-picture-o'                           => 'f03e',
        'fa-pencil'                              => 'f040',
        'fa-map-marker'                          => 'f041',
        'fa-adjust'                              => 'f042',
        'fa-tint'                                => 'f043',
        'fa-pencil-square-o'                     => 'f044',
        'fa-share-square-o'                      => 'f045',
        'fa-check-square-o'                      => 'f046',
        'fa-arrows'                              => 'f047',
        'fa-step-backward'                       => 'f048',
        'fa-fast-backward'                       => 'f049',
        'fa-backward'                            => 'f04a',
        'fa-play'                                => 'f04b',
        'fa-pause'                               => 'f04c',
        'fa-stop'                                => 'f04d',
        'fa-forward'                             => 'f04e',
        'fa-fast-forward'                        => 'f050',
        'fa-step-forward'                        => 'f051',
        'fa-eject'                               => 'f052',
        'fa-chevron-left'                        => 'f053',
        'fa-chevron-right'                       => 'f054',
        'fa-plus-circle'                         => 'f055',
        'fa-minus-circle'                        => 'f056',
        'fa-times-circle'                        => 'f057',
        'fa-check-circle'                        => 'f058',
        'fa-question-circle'                     => 'f059',
        'fa-info-circle'                         => 'f05a',
        'fa-crosshairs'                          => 'f05b',
        'fa-times-circle-o'                      => 'f05c',
        'fa-check-circle-o'                      => 'f05d',
        'fa-ban'                                 => 'f05e',
        'fa-arrow-left'                          => 'f060',
        'fa-arrow-right'                         => 'f061',
        'fa-arrow-up'                            => 'f062',
        'fa-arrow-down'                          => 'f063',
        'fa-share'                               => 'f064',
        'fa-expand'                              => 'f065',
        'fa-compress'                            => 'f066',
        'fa-plus'                                => 'f067',
        'fa-minus'                               => 'f068',
        'fa-asterisk'                            => 'f069',
        'fa-exclamation-circle'                  => 'f06a',
        'fa-gift'                                => 'f06b',
        'fa-leaf'                                => 'f06c',
        'fa-fire'                                => 'f06d',
        'fa-eye'                                 => 'f06e',
        'fa-eye-slash'                           => 'f070',
        'fa-exclamation-triangle'                => 'f071',
        'fa-plane'                               => 'f072',
        'fa-calendar'                            => 'f073',
        'fa-random'                              => 'f074',
        'fa-comment'                             => 'f075',
        'fa-magnet'                              => 'f076',
        'fa-chevron-up'                          => 'f077',
        'fa-chevron-down'                        => 'f078',
        'fa-retweet'                             => 'f079',
        'fa-shopping-cart'                       => 'f07a',
        'fa-folder'                              => 'f07b',
        'fa-folder-open'                         => 'f07c',
        'fa-arrows-v'                            => 'f07d',
        'fa-arrows-h'                            => 'f07e',
        'fa-bar-chart'                           => 'f080',
        'fa-twitter-square'                      => 'f081',
        'fa-facebook-square'                     => 'f082',
        'fa-camera-retro'                        => 'f083',
        'fa-key'                                 => 'f084',
        'fa-cogs'                                => 'f085',
        'fa-comments'                            => 'f086',
        'fa-thumbs-o-up'                         => 'f087',
        'fa-thumbs-o-down'                       => 'f088',
        'fa-star-half'                           => 'f089',
        'fa-heart-o'                             => 'f08a',
        'fa-sign-out'                            => 'f08b',
        'fa-linkedin-square'                     => 'f08c',
        'fa-thumb-tack'                          => 'f08d',
        'fa-external-link'                       => 'f08e',
        'fa-sign-in'                             => 'f090',
        'fa-trophy'                              => 'f091',
        'fa-github-square'                       => 'f092',
        'fa-upload'                              => 'f093',
        'fa-lemon-o'                             => 'f094',
        'fa-phone'                               => 'f095',
        'fa-square-o'                            => 'f096',
        'fa-bookmark-o'                          => 'f097',
        'fa-phone-square'                        => 'f098',
        'fa-twitter'                             => 'f099',
        'fa-facebook'                            => 'f09a',
        'fa-github'                              => 'f09b',
        'fa-unlock'                              => 'f09c',
        'fa-credit-card'                         => 'f09d',
        'fa-rss'                                 => 'f09e',
        'fa-hdd-o'                               => 'f0a0',
        'fa-bullhorn'                            => 'f0a1',
        'fa-bell'                                => 'f0f3',
        'fa-certificate'                         => 'f0a3',
        'fa-hand-o-right'                        => 'f0a4',
        'fa-hand-o-left'                         => 'f0a5',
        'fa-hand-o-up'                           => 'f0a6',
        'fa-hand-o-down'                         => 'f0a7',
        'fa-arrow-circle-left'                   => 'f0a8',
        'fa-arrow-circle-right'                  => 'f0a9',
        'fa-arrow-circle-up'                     => 'f0aa',
        'fa-arrow-circle-down'                   => 'f0ab',
        'fa-globe'                               => 'f0ac',
        'fa-wrench'                              => 'f0ad',
        'fa-tasks'                               => 'f0ae',
        'fa-filter'                              => 'f0b0',
        'fa-briefcase'                           => 'f0b1',
        'fa-arrows-alt'                          => 'f0b2',
        'fa-users'                               => 'f0c0',
        'fa-link'                                => 'f0c1',
        'fa-cloud'                               => 'f0c2',
        'fa-flask'                               => 'f0c3',
        'fa-scissors'                            => 'f0c4',
        'fa-files-o'                             => 'f0c5',
        'fa-paperclip'                           => 'f0c6',
        'fa-floppy-o'                            => 'f0c7',
        'fa-square'                              => 'f0c8',
        'fa-bars'                                => 'f0c9',
        'fa-list-ul'                             => 'f0ca',
        'fa-list-ol'                             => 'f0cb',
        'fa-strikethrough'                       => 'f0cc',
        'fa-underline'                           => 'f0cd',
        'fa-table'                               => 'f0ce',
        'fa-magic'                               => 'f0d0',
        'fa-truck'                               => 'f0d1',
        'fa-pinterest'                           => 'f0d2',
        'fa-pinterest-square'                    => 'f0d3',
        'fa-google-plus-square'                  => 'f0d4',
        'fa-google-plus'                         => 'f0d5',
        'fa-money'                               => 'f0d6',
        'fa-caret-down'                          => 'f0d7',
        'fa-caret-up'                            => 'f0d8',
        'fa-caret-left'                          => 'f0d9',
        'fa-caret-right'                         => 'f0da',
        'fa-columns'                             => 'f0db',
        'fa-sort'                                => 'f0dc',
        'fa-sort-desc'                           => 'f0dd',
        'fa-sort-asc'                            => 'f0de',
        'fa-envelope'                            => 'f0e0',
        'fa-linkedin'                            => 'f0e1',
        'fa-undo'                                => 'f0e2',
        'fa-gavel'                               => 'f0e3',
        'fa-tachometer'                          => 'f0e4',
        'fa-comment-o'                           => 'f0e5',
        'fa-comments-o'                          => 'f0e6',
        'fa-bolt'                                => 'f0e7',
        'fa-sitemap'                             => 'f0e8',
        'fa-umbrella'                            => 'f0e9',
        'fa-clipboard'                           => 'f0ea',
        'fa-lightbulb-o'                         => 'f0eb',
        'fa-exchange'                            => 'f0ec',
        'fa-cloud-download'                      => 'f0ed',
        'fa-cloud-upload'                        => 'f0ee',
        'fa-user-md'                             => 'f0f0',
        'fa-stethoscope'                         => 'f0f1',
        'fa-suitcase'                            => 'f0f2',
        'fa-bell-o'                              => 'f0a2',
        'fa-coffee'                              => 'f0f4',
        'fa-cutlery'                             => 'f0f5',
        'fa-file-text-o'                         => 'f0f6',
        'fa-building-o'                          => 'f0f7',
        'fa-hospital-o'                          => 'f0f8',
        'fa-ambulance'                           => 'f0f9',
        'fa-medkit'                              => 'f0fa',
        'fa-fighter-jet'                         => 'f0fb',
        'fa-beer'                                => 'f0fc',
        'fa-h-square'                            => 'f0fd',
        'fa-plus-square'                         => 'f0fe',
        'fa-angle-double-left'                   => 'f100',
        'fa-angle-double-right'                  => 'f101',
        'fa-angle-double-up'                     => 'f102',
        'fa-angle-double-down'                   => 'f103',
        'fa-angle-left'                          => 'f104',
        'fa-angle-right'                         => 'f105',
        'fa-angle-up'                            => 'f106',
        'fa-angle-down'                          => 'f107',
        'fa-desktop'                             => 'f108',
        'fa-laptop'                              => 'f109',
        'fa-tablet'                              => 'f10a',
        'fa-mobile'                              => 'f10b',
        'fa-circle-o'                            => 'f10c',
        'fa-quote-left'                          => 'f10d',
        'fa-quote-right'                         => 'f10e',
        'fa-spinner'                             => 'f110',
        'fa-circle'                              => 'f111',
        'fa-reply'                               => 'f112',
        'fa-github-alt'                          => 'f113',
        'fa-folder-o'                            => 'f114',
        'fa-folder-open-o'                       => 'f115',
        'fa-smile-o'                             => 'f118',
        'fa-frown-o'                             => 'f119',
        'fa-meh-o'                               => 'f11a',
        'fa-gamepad'                             => 'f11b',
        'fa-keyboard-o'                          => 'f11c',
        'fa-flag-o'                              => 'f11d',
        'fa-flag-checkered'                      => 'f11e',
        'fa-terminal'                            => 'f120',
        'fa-code'                                => 'f121',
        'fa-reply-all'                           => 'f122',
        'fa-star-half-o'                         => 'f123',
        'fa-location-arrow'                      => 'f124',
        'fa-crop'                                => 'f125',
        'fa-code-fork'                           => 'f126',
        'fa-chain-broken'                        => 'f127',
        'fa-question'                            => 'f128',
        'fa-info'                                => 'f129',
        'fa-exclamation'                         => 'f12a',
        'fa-superscript'                         => 'f12b',
        'fa-subscript'                           => 'f12c',
        'fa-eraser'                              => 'f12d',
        'fa-puzzle-piece'                        => 'f12e',
        'fa-microphone'                          => 'f130',
        'fa-microphone-slash'                    => 'f131',
        'fa-shield'                              => 'f132',
        'fa-calendar-o'                          => 'f133',
        'fa-fire-extinguisher'                   => 'f134',
        'fa-rocket'                              => 'f135',
        'fa-maxcdn'                              => 'f136',
        'fa-chevron-circle-left'                 => 'f137',
        'fa-chevron-circle-right'                => 'f138',
        'fa-chevron-circle-up'                   => 'f139',
        'fa-chevron-circle-down'                 => 'f13a',
        'fa-html5'                               => 'f13b',
        'fa-css3'                                => 'f13c',
        'fa-anchor'                              => 'f13d',
        'fa-unlock-alt'                          => 'f13e',
        'fa-bullseye'                            => 'f140',
        'fa-ellipsis-h'                          => 'f141',
        'fa-ellipsis-v'                          => 'f142',
        'fa-rss-square'                          => 'f143',
        'fa-play-circle'                         => 'f144',
        'fa-ticket'                              => 'f145',
        'fa-minus-square'                        => 'f146',
        'fa-minus-square-o'                      => 'f147',
        'fa-level-up'                            => 'f148',
        'fa-level-down'                          => 'f149',
        'fa-check-square'                        => 'f14a',
        'fa-pencil-square'                       => 'f14b',
        'fa-external-link-square'                => 'f14c',
        'fa-share-square'                        => 'f14d',
        'fa-compass'                             => 'f14e',
        'fa-caret-square-o-down'                 => 'f150',
        'fa-caret-square-o-up'                   => 'f151',
        'fa-caret-square-o-right'                => 'f152',
        'fa-eur'                                 => 'f153',
        'fa-gbp'                                 => 'f154',
        'fa-usd'                                 => 'f155',
        'fa-inr'                                 => 'f156',
        'fa-jpy'                                 => 'f157',
        'fa-rub'                                 => 'f158',
        'fa-krw'                                 => 'f159',
        'fa-btc'                                 => 'f15a',
        'fa-file'                                => 'f15b',
        'fa-file-text'                           => 'f15c',
        'fa-sort-alpha-asc'                      => 'f15d',
        'fa-sort-alpha-desc'                     => 'f15e',
        'fa-sort-amount-asc'                     => 'f160',
        'fa-sort-amount-desc'                    => 'f161',
        'fa-sort-numeric-asc'                    => 'f162',
        'fa-sort-numeric-desc'                   => 'f163',
        'fa-thumbs-up'                           => 'f164',
        'fa-thumbs-down'                         => 'f165',
        'fa-youtube-square'                      => 'f166',
        'fa-youtube'                             => 'f167',
        'fa-xing'                                => 'f168',
        'fa-xing-square'                         => 'f169',
        'fa-youtube-play'                        => 'f16a',
        'fa-dropbox'                             => 'f16b',
        'fa-stack-overflow'                      => 'f16c',
        'fa-instagram'                           => 'f16d',
        'fa-flickr'                              => 'f16e',
        'fa-adn'                                 => 'f170',
        'fa-bitbucket'                           => 'f171',
        'fa-bitbucket-square'                    => 'f172',
        'fa-tumblr'                              => 'f173',
        'fa-tumblr-square'                       => 'f174',
        'fa-long-arrow-down'                     => 'f175',
        'fa-long-arrow-up'                       => 'f176',
        'fa-long-arrow-left'                     => 'f177',
        'fa-long-arrow-right'                    => 'f178',
        'fa-apple'                               => 'f179',
        'fa-windows'                             => 'f17a',
        'fa-android'                             => 'f17b',
        'fa-linux'                               => 'f17c',
        'fa-dribbble'                            => 'f17d',
        'fa-skype'                               => 'f17e',
        'fa-foursquare'                          => 'f180',
        'fa-trello'                              => 'f181',
        'fa-female'                              => 'f182',
        'fa-male'                                => 'f183',
        'fa-gratipay'                            => 'f184',
        'fa-sun-o'                               => 'f185',
        'fa-moon-o'                              => 'f186',
        'fa-archive'                             => 'f187',
        'fa-bug'                                 => 'f188',
        'fa-vk'                                  => 'f189',
        'fa-weibo'                               => 'f18a',
        'fa-renren'                              => 'f18b',
        'fa-pagelines'                           => 'f18c',
        'fa-stack-exchange'                      => 'f18d',
        'fa-arrow-circle-o-right'                => 'f18e',
        'fa-arrow-circle-o-left'                 => 'f190',
        'fa-caret-square-o-left'                 => 'f191',
        'fa-dot-circle-o'                        => 'f192',
        'fa-wheelchair'                          => 'f193',
        'fa-vimeo-square'                        => 'f194',
        'fa-try'                                 => 'f195',
        'fa-plus-square-o'                       => 'f196',
        'fa-space-shuttle'                       => 'f197',
        'fa-slack'                               => 'f198',
        'fa-envelope-square'                     => 'f199',
        'fa-wordpress'                           => 'f19a',
        'fa-openid'                              => 'f19b',
        'fa-university'                          => 'f19c',
        'fa-graduation-cap'                      => 'f19d',
        'fa-yahoo'                               => 'f19e',
        'fa-google'                              => 'f1a0',
        'fa-reddit'                              => 'f1a1',
        'fa-reddit-square'                       => 'f1a2',
        'fa-stumbleupon-circle'                  => 'f1a3',
        'fa-stumbleupon'                         => 'f1a4',
        'fa-delicious'                           => 'f1a5',
        'fa-digg'                                => 'f1a6',
        'fa-pied-piper-pp'                       => 'f1a7',
        'fa-pied-piper-alt'                      => 'f1a8',
        'fa-drupal'                              => 'f1a9',
        'fa-joomla'                              => 'f1aa',
        'fa-language'                            => 'f1ab',
        'fa-fax'                                 => 'f1ac',
        'fa-building'                            => 'f1ad',
        'fa-child'                               => 'f1ae',
        'fa-paw'                                 => 'f1b0',
        'fa-spoon'                               => 'f1b1',
        'fa-cube'                                => 'f1b2',
        'fa-cubes'                               => 'f1b3',
        'fa-behance'                             => 'f1b4',
        'fa-behance-square'                      => 'f1b5',
        'fa-steam'                               => 'f1b6',
        'fa-steam-square'                        => 'f1b7',
        'fa-recycle'                             => 'f1b8',
        'fa-car'                                 => 'f1b9',
        'fa-taxi'                                => 'f1ba',
        'fa-tree'                                => 'f1bb',
        'fa-spotify'                             => 'f1bc',
        'fa-deviantart'                          => 'f1bd',
        'fa-soundcloud'                          => 'f1be',
        'fa-database'                            => 'f1c0',
        'fa-file-pdf-o'                          => 'f1c1',
        'fa-file-word-o'                         => 'f1c2',
        'fa-file-excel-o'                        => 'f1c3',
        'fa-file-powerpoint-o'                   => 'f1c4',
        'fa-file-image-o'                        => 'f1c5',
        'fa-file-archive-o'                      => 'f1c6',
        'fa-file-audio-o'                        => 'f1c7',
        'fa-file-video-o'                        => 'f1c8',
        'fa-file-code-o'                         => 'f1c9',
        'fa-vine'                                => 'f1ca',
        'fa-codepen'                             => 'f1cb',
        'fa-jsfiddle'                            => 'f1cc',
        'fa-life-ring'                           => 'f1cd',
        'fa-circle-o-notch'                      => 'f1ce',
        'fa-rebel'                               => 'f1d0',
        'fa-empire'                              => 'f1d1',
        'fa-git-square'                          => 'f1d2',
        'fa-git'                                 => 'f1d3',
        'fa-hacker-news'                         => 'f1d4',
        'fa-tencent-weibo'                       => 'f1d5',
        'fa-qq'                                  => 'f1d6',
        'fa-weixin'                              => 'f1d7',
        'fa-paper-plane'                         => 'f1d8',
        'fa-paper-plane-o'                       => 'f1d9',
        'fa-history'                             => 'f1da',
        'fa-circle-thin'                         => 'f1db',
        'fa-header'                              => 'f1dc',
        'fa-paragraph'                           => 'f1dd',
        'fa-sliders'                             => 'f1de',
        'fa-share-alt'                           => 'f1e0',
        'fa-share-alt-square'                    => 'f1e1',
        'fa-bomb'                                => 'f1e2',
        'fa-futbol-o'                            => 'f1e3',
        'fa-tty'                                 => 'f1e4',
        'fa-binoculars'                          => 'f1e5',
        'fa-plug'                                => 'f1e6',
        'fa-slideshare'                          => 'f1e7',
        'fa-twitch'                              => 'f1e8',
        'fa-yelp'                                => 'f1e9',
        'fa-newspaper-o'                         => 'f1ea',
        'fa-wifi'                                => 'f1eb',
        'fa-calculator'                          => 'f1ec',
        'fa-paypal'                              => 'f1ed',
        'fa-google-wallet'                       => 'f1ee',
        'fa-cc-visa'                             => 'f1f0',
        'fa-cc-mastercard'                       => 'f1f1',
        'fa-cc-discover'                         => 'f1f2',
        'fa-cc-amex'                             => 'f1f3',
        'fa-cc-paypal'                           => 'f1f4',
        'fa-cc-stripe'                           => 'f1f5',
        'fa-bell-slash'                          => 'f1f6',
        'fa-bell-slash-o'                        => 'f1f7',
        'fa-trash'                               => 'f1f8',
        'fa-copyright'                           => 'f1f9',
        'fa-at'                                  => 'f1fa',
        'fa-eyedropper'                          => 'f1fb',
        'fa-paint-brush'                         => 'f1fc',
        'fa-birthday-cake'                       => 'f1fd',
        'fa-area-chart'                          => 'f1fe',
        'fa-pie-chart'                           => 'f200',
        'fa-line-chart'                          => 'f201',
        'fa-lastfm'                              => 'f202',
        'fa-lastfm-square'                       => 'f203',
        'fa-toggle-off'                          => 'f204',
        'fa-toggle-on'                           => 'f205',
        'fa-bicycle'                             => 'f206',
        'fa-bus'                                 => 'f207',
        'fa-ioxhost'                             => 'f208',
        'fa-angellist'                           => 'f209',
        'fa-cc'                                  => 'f20a',
        'fa-ils'                                 => 'f20b',
        'fa-meanpath'                            => 'f20c',
        'fa-buysellads'                          => 'f20d',
        'fa-connectdevelop'                      => 'f20e',
        'fa-dashcube'                            => 'f210',
        'fa-forumbee'                            => 'f211',
        'fa-leanpub'                             => 'f212',
        'fa-sellsy'                              => 'f213',
        'fa-shirtsinbulk'                        => 'f214',
        'fa-simplybuilt'                         => 'f215',
        'fa-skyatlas'                            => 'f216',
        'fa-cart-plus'                           => 'f217',
        'fa-cart-arrow-down'                     => 'f218',
        'fa-diamond'                             => 'f219',
        'fa-ship'                                => 'f21a',
        'fa-user-secret'                         => 'f21b',
        'fa-motorcycle'                          => 'f21c',
        'fa-street-view'                         => 'f21d',
        'fa-heartbeat'                           => 'f21e',
        'fa-venus'                               => 'f221',
        'fa-mars'                                => 'f222',
        'fa-mercury'                             => 'f223',
        'fa-transgender'                         => 'f224',
        'fa-transgender-alt'                     => 'f225',
        'fa-venus-double'                        => 'f226',
        'fa-mars-double'                         => 'f227',
        'fa-venus-mars'                          => 'f228',
        'fa-mars-stroke'                         => 'f229',
        'fa-mars-stroke-v'                       => 'f22a',
        'fa-mars-stroke-h'                       => 'f22b',
        'fa-neuter'                              => 'f22c',
        'fa-genderless'                          => 'f22d',
        'fa-facebook-official'                   => 'f230',
        'fa-pinterest-p'                         => 'f231',
        'fa-whatsapp'                            => 'f232',
        'fa-server'                              => 'f233',
        'fa-user-plus'                           => 'f234',
        'fa-user-times'                          => 'f235',
        'fa-bed'                                 => 'f236',
        'fa-viacoin'                             => 'f237',
        'fa-train'                               => 'f238',
        'fa-subway'                              => 'f239',
        'fa-medium'                              => 'f23a',
        'fa-y-combinator'                        => 'f23b',
        'fa-optin-monster'                       => 'f23c',
        'fa-opencart'                            => 'f23d',
        'fa-expeditedssl'                        => 'f23e',
        'fa-battery-full'                        => 'f240',
        'fa-battery-three-quarters'              => 'f241',
        'fa-battery-half'                        => 'f242',
        'fa-battery-quarter'                     => 'f243',
        'fa-battery-empty'                       => 'f244',
        'fa-mouse-pointer'                       => 'f245',
        'fa-i-cursor'                            => 'f246',
        'fa-object-group'                        => 'f247',
        'fa-object-ungroup'                      => 'f248',
        'fa-sticky-note'                         => 'f249',
        'fa-sticky-note-o'                       => 'f24a',
        'fa-cc-jcb'                              => 'f24b',
        'fa-cc-diners-club'                      => 'f24c',
        'fa-clone'                               => 'f24d',
        'fa-balance-scale'                       => 'f24e',
        'fa-hourglass-o'                         => 'f250',
        'fa-hourglass-start'                     => 'f251',
        'fa-hourglass-half'                      => 'f252',
        'fa-hourglass-end'                       => 'f253',
        'fa-hourglass'                           => 'f254',
        'fa-hand-rock-o'                         => 'f255',
        'fa-hand-paper-o'                        => 'f256',
        'fa-hand-scissors-o'                     => 'f257',
        'fa-hand-lizard-o'                       => 'f258',
        'fa-hand-spock-o'                        => 'f259',
        'fa-hand-pointer-o'                      => 'f25a',
        'fa-hand-peace-o'                        => 'f25b',
        'fa-trademark'                           => 'f25c',
        'fa-registered'                          => 'f25d',
        'fa-creative-commons'                    => 'f25e',
        'fa-gg'                                  => 'f260',
        'fa-gg-circle'                           => 'f261',
        'fa-tripadvisor'                         => 'f262',
        'fa-odnoklassniki'                       => 'f263',
        'fa-odnoklassniki-square'                => 'f264',
        'fa-get-pocket'                          => 'f265',
        'fa-wikipedia-w'                         => 'f266',
        'fa-safari'                              => 'f267',
        'fa-chrome'                              => 'f268',
        'fa-firefox'                             => 'f269',
        'fa-opera'                               => 'f26a',
        'fa-internet-explorer'                   => 'f26b',
        'fa-television'                          => 'f26c',
        'fa-contao'                              => 'f26d',
        'fa-500px'                               => 'f26e',
        'fa-amazon'                              => 'f270',
        'fa-calendar-plus-o'                     => 'f271',
        'fa-calendar-minus-o'                    => 'f272',
        'fa-calendar-times-o'                    => 'f273',
        'fa-calendar-check-o'                    => 'f274',
        'fa-industry'                            => 'f275',
        'fa-map-pin'                             => 'f276',
        'fa-map-signs'                           => 'f277',
        'fa-map-o'                               => 'f278',
        'fa-map'                                 => 'f279',
        'fa-commenting'                          => 'f27a',
        'fa-commenting-o'                        => 'f27b',
        'fa-houzz'                               => 'f27c',
        'fa-vimeo'                               => 'f27d',
        'fa-black-tie'                           => 'f27e',
        'fa-fonticons'                           => 'f280',
        'fa-reddit-alien'                        => 'f281',
        'fa-edge'                                => 'f282',
        'fa-credit-card-alt'                     => 'f283',
        'fa-codiepie'                            => 'f284',
        'fa-modx'                                => 'f285',
        'fa-fort-awesome'                        => 'f286',
        'fa-usb'                                 => 'f287',
        'fa-product-hunt'                        => 'f288',
        'fa-mixcloud'                            => 'f289',
        'fa-scribd'                              => 'f28a',
        'fa-pause-circle'                        => 'f28b',
        'fa-pause-circle-o'                      => 'f28c',
        'fa-stop-circle'                         => 'f28d',
        'fa-stop-circle-o'                       => 'f28e',
        'fa-shopping-bag'                        => 'f290',
        'fa-shopping-basket'                     => 'f291',
        'fa-hashtag'                             => 'f292',
        'fa-bluetooth'                           => 'f293',
        'fa-bluetooth-b'                         => 'f294',
        'fa-percent'                             => 'f295',
        'fa-gitlab'                              => 'f296',
        'fa-wpbeginner'                          => 'f297',
        'fa-wpforms'                             => 'f298',
        'fa-envira'                              => 'f299',
        'fa-universal-access'                    => 'f29a',
        'fa-wheelchair-alt'                      => 'f29b',
        'fa-question-circle-o'                   => 'f29c',
        'fa-blind'                               => 'f29d',
        'fa-audio-description'                   => 'f29e',
        'fa-volume-control-phone'                => 'f2a0',
        'fa-braille'                             => 'f2a1',
        'fa-assistive-listening-systems'         => 'f2a2',
        'fa-american-sign-language-interpreting' => 'f2a3',
        'fa-deaf'                                => 'f2a4',
        'fa-glide'                               => 'f2a5',
        'fa-glide-g'                             => 'f2a6',
        'fa-sign-language'                       => 'f2a7',
        'fa-low-vision'                          => 'f2a8',
        'fa-viadeo'                              => 'f2a9',
        'fa-viadeo-square'                       => 'f2aa',
        'fa-snapchat'                            => 'f2ab',
        'fa-snapchat-ghost'                      => 'f2ac',
        'fa-snapchat-square'                     => 'f2ad',
        'fa-pied-piper'                          => 'f2ae',
        'fa-first-order'                         => 'f2b0',
        'fa-yoast'                               => 'f2b1',
        'fa-themeisle'                           => 'f2b2',
        'fa-google-plus-official'                => 'f2b3',
        'fa-font-awesome'                        => 'f2b4'
        );

    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function __construct() {
        parent::__construct (
            'realhome_stat_widget', // id của widget
            'Realhome Stat Widget', // tên của widget

            array(
                'description' => 'Stat Widget for showing in home page' // mô tả
            )
        );
    }

    /**
     * Tạo form option cho widget
     */
    function form( $instance ) {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label><br />
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
        </p>

        <div class="slideList">
            <!--Nếu có dữ liệu cũ thì load dữ liệu của các slide ra-->
            <?php if (isset($instance['number']) && !empty($instance['number'])): ?>
                <?php foreach($instance['number'] as $key => $item): ?>
                    <fieldset class="widget-listing-fieldset">
                        <legend class="widget-listing-legend"><b>Field</b></legend>
                        <!--Number-->
                        <p>
                            <label for="<?php echo $this->get_field_id('number'); ?>[]">Number</label><br />
                            <input type="number"
                                   name="<?php echo $this->get_field_name('number') ?>[]"
                                   value="<?php echo $instance['number'][$key]; ?>"
                                   class="widefat" />
                        </p>
                        <!--Content-->
                        <p>
                            <label for="<?php echo $this->get_field_id('content'); ?>[]">Content</label><br />
                            <input type="text"
                                   name="<?php echo $this->get_field_name('content') ?>[]"
                                   value="<?php echo $instance['content'][$key]; ?>"
                                   class="widefat" />
                        </p>

                        <!--Icon-->
                        <p>
                            <label for="<?php echo $this->get_field_id('icon'); ?>[]">Icon</label><br />
                            <select name="<?php echo $this->get_field_name('icon') ?>[]">
                                <?php foreach ($this->icons_font_awesome as $iconClass => $iconContent) : ?>
                                    <option <?php echo ($instance['icon'][$key] == $iconClass)? 'selected' : ''; ?> value="<?php echo $iconClass; ?>"><?php echo $iconClass; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>

                        <button type="button" class="btnDeleteFile">Delete this file</button>
                    </fieldset>
                <?php endforeach; ?>
            <?php else: ?>
                <fieldset class="widget-listing-fieldset">
                    <legend class="widget-listing-legend"><b>Field</b></legend>
                    <!--Number-->
                    <p>
                        <label for="<?php echo $this->get_field_id('number'); ?>[]">Number</label><br />
                        <input type="number"
                               name="<?php echo $this->get_field_name('number') ?>[]"
                               value=""
                               class="widefat" />
                    </p>
                    <!--Content-->
                    <p>
                        <label for="<?php echo $this->get_field_id('content'); ?>[]">Content</label><br />
                        <input type="text"
                               name="<?php echo $this->get_field_name('content') ?>[]"
                               value=""
                               class="widefat field-content" />
                    </p>

                    <!--Icon-->
                    <p>
                        <label for="<?php echo $this->get_field_id('icon'); ?>[]">Icon</label><br />
                        <select name="<?php echo $this->get_field_name('icon') ?>[]">
                            <?php foreach ($this->icons_font_awesome as $iconClass => $iconContent) : ?>
                                <option value="<?php echo $iconClass; ?>"><?php echo $iconClass; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    <button type="button" class="btnDeleteFile">Delete this file</button>
                </fieldset>
            <?php endif; ?>
            <button style="margin-bottom: 15px; <?php echo (count($instance['number']) >= 3)? 'display:none;' : '';?> " data-formname="<?php echo 'widget-' . $this->id_base . '[' . $this->number . ']'; ?>" id="<?php echo $this->get_field_id('btnAddSlideSet')?>" type="button" onclick="addNewFileListing(id);">Add more file</button>
        </div>
        <?php
    }

    /**
     * save widget form
     */

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['number'] = $new_instance['number'];
        $instance['content'] = $new_instance['content'];
        $instance['icon'] = $new_instance['icon'];
        return $instance;
    }

    /**
     * Show widget
     */

    function widget( $args, $instance ) {
        echo $before_widget;
        ?>

        <div class="stats">
            <div class="container">
                <h3><?php echo $instance['title']; ?></h3>
                <div class="stats-info">
                    <?php if (isset($instance['number']) && !empty($instance['number'])): ?>
                        <?php foreach($instance['number'] as $key => $item): ?>
                        <div class="col-md-4 col-sm-4 stats-grid slideanim">
                            <i class="fa <?php echo $instance['icon'][$key]; ?>" aria-hidden="true"></i>
                            <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='<?php echo $instance['number'][$key]; ?>' data-delay='.5' data-increment="<?php echo round($instance['number'][$key]/600); ?>"><?php echo $instance['number'][$key]; ?></div>
                            <p class="stats-info"><?php echo $instance['content'][$key]; ?></p>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <?php
        echo $after_widget;
    }
}

// queue up the necessary js
function hrw_enqueue_realhome_stat()
{
    // moved the js to an external file, you may want to change the path
    wp_enqueue_script('hrw_enqueue_realhome_stat', '/wp-content/plugins/realhome-stat/js/script.js', null, null, true);
}
add_action('admin_enqueue_scripts', 'hrw_enqueue_realhome_stat');

wp_enqueue_style('widget_realhome-stat', '/wp-content/plugins/realhome-stat/css/index.css');
?>