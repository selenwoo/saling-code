/*
|--------------------------------------------------------------------------
| 产品点击分类闭合
|--------------------------------------------------------------------------
*/
		
$( document ).ready(function()
{
	$(".product_titlebg3").toggle(function(){
				 $(this).css({"background":"url(img/jia.png) 0 5px no-repeat","border-bottom":"1px dashed #CCC"}).next().animate({height: 'toggle'}, "slow");			
										   },function(){
		         $(this).css({"background":"url(img/jian.png) 0 5px no-repeat","border":"none"}).next().animate({height: 'toggle'}, "slow");
											  });

//	$(".mybigclass").toggle(function(){
//				 $(this).css({"border-bottom":"1px dashed #CCC"}).next().animate({height: 'toggle'}, "slow");			
//										   },function(){
//		         $(this).css({"border":"none"}).next().animate({height: 'toggle'}, "slow");
//											  });

		$(".mybigclass").toggle(function(){
				 $(this).next().animate({height: 'toggle'}, "slow");			
										   },function(){
		         $(this).next().animate({height: 'toggle'}, "slow");
											  });
    });
