// serialize data
function serialize (mixedValue) {
  var val, key, okey
  var ktype = ''
  var vals = ''
  var count = 0

  var _utf8Size = function (str) {
    return ~-encodeURI(str).split(/%..|./).length
  }

  var _getType = function (inp) {
    var match
    var key
    var cons
    var types
    var type = typeof inp

    if (type === 'object' && !inp) {
      return 'null'
    }

    if (type === 'object') {
      if (!inp.constructor) {
        return 'object'
      }
      cons = inp.constructor.toString()
      match = cons.match(/(\w+)\(/)
      if (match) {
        cons = match[1].toLowerCase()
      }
      types = ['boolean', 'number', 'string', 'array']
      for (key in types) {
        if (cons === types[key]) {
          type = types[key]
          break
        }
      }
    }
    return type
  }

  var type = _getType(mixedValue)

  switch (type) {
    case 'function':
      val = ''
      break
    case 'boolean':
      val = 'b:' + (mixedValue ? '1' : '0')
      break
    case 'number':
      val = (Math.round(mixedValue) === mixedValue ? 'i' : 'd') + ':' + mixedValue
      break
    case 'string':
      val = 's:' + _utf8Size(mixedValue) + ':"' + mixedValue + '"'
      break
    case 'array':
    case 'object':
      val = 'a'

      for (key in mixedValue) {
        if (mixedValue.hasOwnProperty(key)) {
          ktype = _getType(mixedValue[key])
          if (ktype === 'function') {
            continue
          }

          okey = (key.match(/^[0-9]+$/) ? parseInt(key, 10) : key)
          vals += serialize(okey) + serialize(mixedValue[key])
          count++
        }
      }
      val += ':' + count + ':{' + vals + '}'
      break
    case 'undefined':
    default:
      val = 'N'
      break
  }
  if (type !== 'object' && type !== 'array') {
    val += ';'
  }

  return val
}

jQuery(function ($) {
    $(document).ready(function () {

    	   /**
          *
          * Slider functions
          *
          */
    	var count = jQuery("#slider_data").children().length;
    	var x= count+1;
    	$(document).on( "click","#btn_add_slide", function() {
  				if ( count<=2 ) {
  					$('#slider_data').append('<div class="slider_section"><button class="mt-2 btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#slide_collapse-'+x+'" aria-expanded="false" aria-controls="slide_collapse">Slide</button><div class="collapse" id="slide_collapse-'+x+'"><div class="card card-body card-slider"><div class="form-group"><label for="image_url">Image</label><input type="url" name="image_url" class="image_url"><button type="button" class="btn btn-primary btn-sm mt-2 upload_slider_image"  >Upload Image</button></div><!-- .form group --><div class="form-group"><label for="image_title">Image Title</label><input class="form-control" type="text" name="image_title" id="image_title"></div><!-- .form group --><div class="form-group"><label for="image_desc">Image Description</label><textarea class="form-control" id="image_desc" name="image_desc"></textarea></div><!-- .form group --><div class="form-group"><label for="btn_label">Button label</label><input class="form-control" type="text" name="btn_label" id="btn_label"></div><!-- .form group --><div class="form-group"><label for="btn_url">Button link</label><input class="form-control" type="url" name="btn_url" id="btn_url"></div><!-- .form group --><button type="button" class="btn btn-warning btn-sm remove_slide_btn">Remove Slide</button></div><!-- .card --></div><!-- .collapse --></div>');
  						count++;
  						x++;
  				}else{
  					$('#btn_add_slide').text('Max 3 Slides Only');
  					$('#btn_add_slide').attr('disabled','disabled');
  				}
		});

		// remove slide button
		$( document ).on( "click",".remove_slide_btn",function() {
			$(this).closest('.slider_section').remove();
			count--;
			$("#btn_add_slide").removeAttr('disabled');
			$('#btn_add_slide').text('+ Add Slide');
		});

    jQuery( document ).on("click",".upload_slider_image",function(e) {
        e.preventDefault();
        var button = this;
        var image  = wp.media({
            title: 'Upload Image',
            multiple: false
        }).open()
            .on('select', function (e) {
              var uploaded_image = image.state().get('selection').first();
              var location_image = uploaded_image.toJSON().url;                    
              jQuery( button ).parent().find('.image_url').val(location_image);
              jQuery( button ).parent().find('img').remove();
              jQuery( button ).parent().prepend('<img class="wl-ad-img-tag" src="'+location_image+'" />');
            });
    });

        jQuery("#btn_save_slider").click(function(e){
       e.preventDefault();

     var slider = [];
       jQuery('.card-slider').each(function() {
        var data       = {};
          var input      = jQuery(this).find('input');
          var textarea   = jQuery(this).find('textarea');
          data.image_url = input[0].value;
          data.image_title = input[1].value;
          data.image_desc = textarea[0].value;
          data.button_label = input[2].value;
          data.button_link = input[3].value;
          slider.push(data);
       });
       jQuery( '#_customize-input-travello_slider_data' ).val( serialize( slider ) );
       jQuery( '#_customize-input-travello_slider_data' ).trigger('change');
       jQuery('body').find('#customize-save-button-wrapper #save').trigger('click');
     });

         /**
          *
          * Choose us functions
          *
          */
         
      var cu_count = jQuery("#choose_us_data").children().length;
      var cu_x= cu_count+1;
      $(document).on( "click","#btn_add_choose_us_field", function() {
          if ( cu_count<=2 ) {
            $('#choose_us_data').append(' <div class="choose_us_section"> <button class="btn btn-primary btn-block mt-2" type="button" data-toggle="collapse" data-target="#choose_us_collapse-'+cu_x+'" aria-expanded="false" aria-controls="spo_collapse">Field</button> <div class="collapse" id="choose_us_collapse-'+cu_x+'"> <div class="card card-body card-choose-us"> <div class="form-group"> <label for="image_url" >Image</label> <img class="wl-upload-img-tag" src=""> <input type="url" name="image_url" class="image_url" value="" > <button type="button" class="btn btn-primary btn-sm mt-2 upload_choose_us_image" >Upload Image</button> </div><div class="form-group"> <label for="section_title" >Title</label> <input class="form-control image_title" type="text" name="image_title" id="section_title" value="" > </div><div class="form-group"> <label for="section_desc" >Description</label> <textarea class="form-control" id="section_desc" name="image_desc" ></textarea> </div><button type="button" class="btn btn-warning btn-sm remove_field_btn">Remove Field</button> </div></div></div>');
              cu_count++;
              cu_x++;
          }else{
            $('#btn_add_choose_us_field').text('Max 3 Fields Only');
            $('#btn_add_choose_us_field').attr('disabled','disabled');
          }
    });

    // remove slide button
    $( document ).on( "click",".remove_field_btn",function() {
      $(this).closest('.choose_us_section').remove();
      cu_count--;
      $("#btn_add_choose_us_field").removeAttr('disabled');
      $('#btn_add_choose_us_field').text('+ Add Field');
    });

    jQuery( document ).on("click",".upload_choose_us_image",function(e) {
        e.preventDefault();
        var button = this;
        var image  = wp.media({
            title: 'Upload Image',
            multiple: false
        }).open()
            .on('select', function (e) {
              var uploaded_image = image.state().get('selection').first();
              var location_image = uploaded_image.toJSON().url; 
              jQuery( button ).parent().find('.image_url').val(location_image);
              jQuery( button ).parent().find('img').remove();
             jQuery( button ).parent().prepend('<img class="wl-ad-img-tag" src="'+location_image+'" />');
            });
    });

    jQuery("#btn_save_choose_us").click(function(e) {
    e.preventDefault();

     var choose_us_data = [];
       jQuery('.card-choose-us').each(function() {
        var data       = {};
          var input      = jQuery(this).find('input');
          var textarea   = jQuery(this).find('textarea');
          data.image_url = input[0].value;
          data.choose_us_title = input[1].value;
          data.choose_us_desc = textarea[0].value;
          choose_us_data.push(data);
       });
       jQuery( '#_customize-input-travello_choose_us_data' ).val( serialize( choose_us_data ) );
       jQuery( '#_customize-input-travello_choose_us_data' ).trigger('change');
       jQuery('body').find('#customize-save-button-wrapper #save').trigger('click');
     });

    /**
          *
          * Special offers functions
          *
          */
      var spo_count = jQuery("#special_offers_data").children().length;
      var spo_x= spo_count+1;
      $(document).on( "click","#btn_add_special_offer_field", function() {
          if ( spo_count<=3 ) {
            $('#special_offers_data').append('<div class="special_offers_section"><button class="btn btn-primary btn-block mt-2" type="button" data-toggle="collapse" data-target="#spo_collapse-'+spo_x+'" aria-expanded="false" aria-controls="spo_collapse">Field</button><div class="collapse" id="spo_collapse-'+spo_x+'"><div class="card card-body card-special-offers"><div class="form-group"><label for="image_url" >Image</label><img class="wl-upload-img-tag" src=""><input type="url" name="image_url" class="image_url" value="" ><button type="button" class="btn btn-primary btn-sm mt-2 upload_spo_image" >Upload Image</button></div><div class="form-group"><label for="image_title" >Title</label><input class="form-control image_title" type="text" name="title" id="special_offers_title" value="" ></div><div class="form-group"><label for="image_desc" >Description</label><textarea class="form-control" id="special_offers_desc" name="desc" ></textarea></div><div class="form-group"><label for="spo_price" >Price</label><input class="form-control" type="text" name="spo_price" id="spo_price" value="" ></div><div class="form-group"><label for="spo_duration" >Duration</label><input class="form-control" type="text" name="spo_duration" id="spo_duration" value="" ></div><div class="form-group"><label for="btn_label" >Button Label</label><input class="form-control" type="text" name="btn_label" id="btn_label" value="" ></div><div class="form-group"><label for="btn_url" >Button Link</label><input class="form-control" type="url" name="btn_url" id="btn_url" value="" ></div><button type="button" class="btn btn-warning btn-sm remove_spo_btn">Remove Slide</button></div></div></div>');
              spo_count++;
              spo_x++;
          }else{
            $('#btn_add_special_offer_field').text('Max 4 Fields Only');
            $('#btn_add_special_offer_field').attr('disabled','disabled');
          }
    });

    // remove spo field button
    $( document ).on( "click",".remove_spo_btn",function() {
      $(this).closest('.special_offers_section').remove();
      spo_count--;
      $("#btn_add_special_offer_field").removeAttr('disabled');
      $('#btn_add_special_offer_field').text('+ Add Slide');
    });

    jQuery( document ).on("click",".upload_spo_image",function(e) {
        e.preventDefault();
        var button = this;
        var image  = wp.media({
            title: 'Upload Image',
            multiple: false
        }).open()
            .on('select', function (e) {
              var uploaded_image = image.state().get('selection').first();
              var location_image = uploaded_image.toJSON().url;                    
              jQuery( button ).parent().find('.image_url').val(location_image);
              jQuery( button ).parent().find('img').remove();
              jQuery( button ).parent().prepend('<img class="wl-ad-img-tag" src="'+location_image+'" />');
            });
    });

        jQuery("#btn_save_special_offer").click(function(e){
       e.preventDefault();

     var slider = [];
       jQuery('.card-special-offers').each(function() {
        var data       = {};
          var input      = jQuery(this).find('input');
          var textarea   = jQuery(this).find('textarea');
          data.image_url = input[0].value;
          data.spo_title = input[1].value;
          data.spo_desc = textarea[0].value;
          data.spo_price = input[2].value;
          data.spo_duration = input[3].value;
          data.button_label = input[4].value;
          data.button_link = input[5].value;
          slider.push(data);
       });
       jQuery( '#_customize-input-special_offers_data' ).val( serialize( slider ) );
       jQuery( '#_customize-input-special_offers_data' ).trigger('change');
       jQuery('body').find('#customize-save-button-wrapper #save').trigger('click');
     });


    }); // ready function close
}); // jQuery function close
