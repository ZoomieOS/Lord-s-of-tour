jQuery(document).ready(function() {
  if (window.location.href.indexOf("page=lord-of-tours") > -1) {
    jQuery.ajax({
      type: "POST",
      url: ajaxurl,
      dataType: "json",
      data: { action: "lft_query_posts" },
      success: function(lft_posts) {
        jQuery.each(lft_posts, function(index, lft_post) {
          jQuery("select#lft_parse_select").append(
            '<option value="' +
              lft_post.id +
              '">' +
              lft_post.title +
              "</option>"
          );
        });
      },
      error: function(lft_posts) {
        console.log("Что-то пошло не так");
      }
    });

    jQuery("#lets_parse").on("click", function() {
      var lft_id = jQuery("#lft_parse_select")
        .find("option:selected")
        .val();

      jQuery.ajax({
        type: "POST",
        url: ajaxurl,
        dataType: "json",
        data: { action: "get_lft_postdata", lft_id: lft_id },
        success: function(lft_post_data) {
          console.log(lft_post_data);

          jQuery("#parsing_night_key").val(lft_post_data.parsing_night_key);
          jQuery("#lft_before_field").val(lft_post_data.month_before_value_key);
		  jQuery("#lft_after_field").val(lft_post_data.month_after_value_key);
		  jQuery("#hotel_checkbox_key").val(lft_post_data.checkfield);
        },
        error: function(lft_post_data) {
          console.log("Что-то пошло не так..");
        }
      });
    });
  }
  
  jQuery(function() {
    jQuery("#parser_form").submit(function() {
      event.preventDefault();
        var formData = {
            "country":parseInt(jQuery("#select_city option:selected").val()),
            "startdata":jQuery("#lft_before_field").val(),
            "enddata":jQuery("#lft_after_field").val(),
            "hotelid":((jQuery("#hotel_checkbox_key").val())).split(',')
        };
        jQuery.ajax({
            url:'http://104.248.19.32:5000',
            type:'POST',
            dataType: 'json',
            contentType: 'application/json;charset=UTF-8',
            data: JSON.stringify(formData),
            success: function(res) {
                alert('Данные для парсинга переданы')
            },
            error: function(response) {
              alert('Что-то пошло не так и данные не отправились');
                        }
        });
        return false;
    });
});
});
