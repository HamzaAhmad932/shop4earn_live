//Globals
var base_url = $('#base_url').val();
var Cart = function () {
	var fetchCart = function(){
		$.ajax({
			url: 'getCart',
			type: 'POST',
			dataType: 'JSON',
			success: function(resp){
				populateCart(resp);
			},
			error: function(xhr, status, error){
				console.log(xhr.responseText);
			}
		});
	};

	var updateCart = function (rowid, qty) {

		$.ajax({
			url: 'updateCart',
			type: 'POST',
			dataType: 'JSON',
			data: {'rowid': rowid, 'qty': qty},
			success: function(resp){
				if(resp == true){
					fetchCart();
				}
			},
			error: function(xhr, status, error){
				console.log(xhr.responseText);
			}
		});
	};

	var removeProducts = function (rowid) {
		$.ajax({
			url: 'removeCart',
			type: 'POST',
			dataType: 'JSON',
			data: {'rowid': rowid},
			success: function(resp){
				if(resp == true){
					fetchCart();
				}
			},
			error: function(xhr, status, error){
				console.log(xhr.responseText);
			}
		});
	};

	var populateCart = function(data){
		var template = '';
		var total = 0;
		$.each(data, function (i, d) {
			total += d.subtotal;
			template += '<tr class="product-row">\n' +
				'    <td class="product-col">\n' +
				'        <figure class="product-image-container">\n' +
				'            <a href="product.html" class="product-image">\n' +
				'                <img src="'+base_url+d.img_path+'" alt="product">\n' +
				'            </a>\n' +
				'        </figure>\n' +
				'        <h2 class="product-title">\n' +
				'            <a href="product.html">'+d.name+'</a>\n' +
				'        </h2>\n' +
				'    </td>\n' +
				'    <td>Rs. '+d.price+'</td>\n' +
				'    <td>\n' +
				'        <input min="1" style="width: 75px" name="qty" class="add_qty_class add_qty" type="number" data-rowid="'+d.rowid+'" value="'+d.qty+'">\n' +
				'    </td>\n' +
				'    <td>Rs. '+d.subtotal+'</td>\n' +
				'    <td>\n' +
				'    \t<div class="float-right">\n' +
				'    \t\t<a style="cursor: pointer" title="Remove product" class="btn-remove remove_product" data-rowid="'+d.rowid+'"><span class="sr-only">Remove</span></a>\n' +
				'    \t</div>\n' +
				'    </td>\n' +
				'</tr>';
		});
		$('#cart_table tbody').empty().append(template);
		$('.add_qty_class').addClass('vertical-quantity form-control');
		$('#sub_total').html('Rs. '+total);
		$('#total_order').html('Rs. '+total);
	};

	return {
		init: function () {
			this.bindUI();
		},
		bindUI: function () {
			var self = this;

			fetchCart();

			//UPDATE QUANTITY
			$(document).on('change', '.add_qty', function (e) {
				e.preventDefault();
				var qty = $(this).val();
				var rowid = $(this).data('rowid');
				updateCart(rowid, qty);
			});

			//REMOVE PRODUCT FROM CART
			$(document).on('click', '.remove_product', function (e) {
				e.preventDefault();
				var rowid = $(this).data('rowid');
				removeProducts(rowid);
			});

			//CLEAR CART
			$(document).on('click', '.btn-clear-cart', function (e) {
				e.preventDefault();
				removeProducts('all');
			});
		}
	}
};

var cart = new Cart();
cart.init();
