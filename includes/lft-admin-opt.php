<h1>Парсинг данных</h1>
<p> Получение данных с сервера и прием для создание записей</p>

<div class="flex_grid">

  <br>
    <label>Выберите парсинг:</label>
<?php do_shortcode('[lft_parse_filter]'); ?>
<form method="POST" id="parser_form">
<div class="grid-lft">
    <label>Выберите страну:</label>
    <select id="select_city">
        <option class="city" value="1">Египет</option>

        <option class="city" value="2">Греция</option>

        <option class="city"value="3">Болгария</option>
    </select>
    <br>
<label for="lft_before_field">C какого числа: </label>
<input type="text" id= "lft_before_field" value="" size="25" />
<br>
<label for="lft_after_field">По какое число: </label>
<input type="text" id= "lft_after_field" value="" size="25" />
<br>
<label for="parsing_night_key">Количество ночей: </label>
<input type="text" id= "parsing_night_key" value="" size="25" />
<br>
    <label for="hotel_checkbox_key">ID отелей: </label>
    <input type="text" id="hotel_checkbox_key" value="" size="25" />
<input value="Спарсить" type="submit"/>
</form>
</div>
