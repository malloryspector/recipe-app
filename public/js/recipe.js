"use strict";

$(document).ready(function(){

	// Adding another ingredient button
	$("#add_ingredient").click(function() {
		// Create new ingredient input fields
		var ingredientName = '<div class="col-sm-8"><input type="text" class="form-control" id="ingredient_name" name="ingredient_name"></div>';

		var quantityWhole = '<div class="col-sm-1"><select class="form-control" id="quantity_whole" name="quantity_whole"><option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div>';

		var quantityPart = '<div class="col-sm-1"><select class="form-control" id="quantity_part" name="quantity_part"><option value="0"></option><option value="1/8">1/8</option><option value="1/4">1/4</option><option value="3/8">3/8</option><option value="1/2">1/2</option><option value="5/8">5/8</option><option value="3/4">3/4</option><option value="7/8">7/8</option></select></div>';

		var unit = '<div class="col-sm-2"><select class="form-control" id="unit" name="unit"><option value="tsp">tsp</option><option value="tbsp">tbsp</option><option value="oz">oz</option><option value="cup">cup</option><option value="pound">pound</option></select></div>';

		$("#ingredient").append('<br><div class="row">' + ingredientName + quantityWhole + quantityPart + unit + '</div>');

	});

});
