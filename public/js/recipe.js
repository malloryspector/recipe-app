"use strict";

$(document).ready(function(){

	// Adding another ingredient button
	$("#add_ingredient").click(function() {

		// Create new ingredient input fields
		var ingredientName = '<div class="col-sm-6"><input type="text" class="form-control" id="ingredient_name" name="ingredient_name[]"></div>';
		var quantityWhole = '<div class="col-sm-1"><select class="form-control" id="quantity_whole" name="quantity_whole[]"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div>';
		var quantityPart = '<div class="col-sm-2"><select class="form-control" id="quantity_part" name="quantity_part[]"><option value="0">0</option><option value="1/8">1/8</option><option value="1/4">1/4</option><option value="3/8">3/8</option><option value="1/2">1/2</option><option value="5/8">5/8</option><option value="3/4">3/4</option><option value="7/8">7/8</option></select></div>';
		var unit = '<div class="col-sm-2"><select class="form-control" id="unit" name="unit[]"><option value="teaspoon">teaspoon</option><option value="tablespoon">tablespoon</option><option value="ounce">ounce</option><option value="cup">cup</option><option value="pound">pound</option><option value="piece">piece</option><option value="stalk">stalk</option><option value="pinch">pinch</option><option value="dash">dash</option><option value="bunch">bunch</option><option value="clove">clove</option><option value="can">can</option></select></div>';
		var removeRow = '<div class="col-sm-1 delete_ingredient"><a href="#">Delete</a></div>';

		$("#ingredient").append('<div class="row">' + ingredientName + quantityWhole + quantityPart + unit + removeRow + '</div>');

	});

	$(document).on('click', ".delete_ingredient", function() {
		$(this).prevAll().remove();
		$(this).remove();
	});

});
