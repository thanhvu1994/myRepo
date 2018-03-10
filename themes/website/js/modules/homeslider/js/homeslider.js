/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @version  Release: $Revision$
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

$(document).ready(function(){

	if (typeof(homeslider_speed) == 'undefined')
		homeslider_speed = 500;
	if (typeof(homeslider_pause) == 'undefined')
		homeslider_pause = 3000;
	if (typeof(homeslider_loop) == 'undefined')
		homeslider_loop = true;
	if (typeof(homeslider_width) == 'undefined')
		homeslider_width = 779;

	$('.homeslider-description').click(function () {
		window.location.href = $(this).prev('a').prop('href');
	});

        $('.flexslider').flexslider();
        
	if (!!$.prototype.bxSlider)
		$('#htmlcontent-congtrinh').bxSlider({
			useCSS: false,
                        nextText: '',
                        prevText: '',
                        moveSlides: 1,
                        slideMargin: 30,
                        autoControls: false,
                        slideSelector: 'li',
                        autoReload: false,
                        breaks: [{screen:0, slides:2, pager:false}],
			slideWidth: homeslider_width,
			infiniteLoop: homeslider_loop,
			hideControlOnEnd: true,
			pager: false,
			autoHover: true,
			auto: homeslider_loop,
			speed: parseInt(homeslider_speed),
			pause: homeslider_pause,
			controls: true
		});
	if (!!$.prototype.bxSlider)
		$('#htmlcontent-khachhang').bxSlider({
			useCSS: false,
			maxSlides: 1,
                        nextText: '',
                        prevText: '',
                        slideMargin: 97,
                        autoReload: true,
                        moveSlides: 1,
                        breaks: [{screen:0, slides:3, pager:false},{screen:460, slides:3},{screen:768, slides:5}],
			slideWidth: homeslider_width,
			infiniteLoop: homeslider_loop,
			hideControlOnEnd: true,
			pager: false,
			autoHover: true,
			auto: homeslider_loop,
			speed: parseInt(homeslider_speed),
			pause: homeslider_pause,
			controls: true
		});
});