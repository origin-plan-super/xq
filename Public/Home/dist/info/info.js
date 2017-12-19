// var info = (function () {
// 	var obj = {
// 		init: function (f) {
// 			$.get(config.getUrl('Index/getInfo'), {
// 				info_id: nav.pageName
// 			}, function (res) {
// 				try {
// 					res = JSON.parse(res);
// 					if (f != null) {
// 						f(res);
// 					}
// 				} catch (e) {
// 					if (f != null) {
// 						f(false);
// 					}
// 				}
// 			});
// 		}
// 	};
// 	return obj;
// }());
// info.init(function (res) {
// 	$("#info_content").html(res.msg.info_content);
// 	$("title").append(res.msg.info_title);
// 	$("#info_title").append(res.msg.info_title);
// 	$("#info_info").append(res.msg.info_info);
// 	$("#info_time").append(res.msg.add_time);

// 	$("#level_1").text(res.page.nav_title);

// 	$("#level_1").attr("href", "../list/list.html?listname=" + res.page.nav_id);
// 	$("#level_2").text(res.msg.info_title);
// });
