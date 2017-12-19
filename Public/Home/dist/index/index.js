// //$(function() {
// //	$.ajax({
// //		type: 'get',
// //		url: '../../app.json',
// //		success: function(msg) {
// //			if(msg.res == "ok") {
// //				push(msg.msg);
// //			} else {
// //				alert("错误");
// //			}
// //		},
// //		error: function(data) {
// //			alert(JSON.stringify(msg));
// //		}
// //	});
// //	function push(data1) {
// //		var app = new Vue({
// //			el: '#app',
// //			data: {
// //				items: data1
// //			}
// //		});
// //	}
// //})
// var index = (function () {
// 	var obj = {
// 		init: function (f) {

// 			if (f != null) {
// 				f();
// 			}
// 		}
// 	};
// 	return obj;
// }());
// index.init();

// var newsApp = new Vue({
// 	el: '#newsApp',
// 	data: {
// 		items: []
// 	},
// 	methods: {
// 		update: function () {
// 			var _this = this;
// 			$.get(config.getUrl('Index/getNewsList'), {}, function (res) {

// 				try {
// 					res = JSON.parse(res);
// 					_this.items = [];
// 					if (res.res > 0) {
// 						_this.items = res.msg;
// 					} else {
// 					}
// 				} catch (e) {
// 				}
// 			});
// 		}
// 	}
// });
// // newsApp.update();
