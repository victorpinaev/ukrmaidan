/*!
 * bootstrap-star-rating v4.0.2
 * http://plugins.krajee.com/star-rating
 *
 * Author: Kartik Visweswaran
 * Copyright: 2013 - 2017, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD 3-Clause
 * https://github.com/kartik-v/bootstrap-star-rating/blob/master/LICENSE.md
 */
$(document).ready(function () {

    $('.single-item').slick({
        dots: true,
        autoplay: true
    });

});

$("#myTab2 li:eq(0) a").tab('show');

$("#advanceSearchTab a").click(function (e) {
	e.preventDefault();
	$(this).tab('show');
});
$("#btnAdvanceSearch").click(function() {
	$('.advanceSearch').toggleClass('hidden');
});

$(".btn-getTheLink").click(function() {
	//открыть модальное окно с id="myModal"
	$("#modalGetTheLink").modal('show');
});












