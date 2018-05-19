<?php
add_action( 'wp_ajax_nopriv_add_object_ajax', 'add_object' ); // крепим на событие wp_ajax_nopriv_add_object_ajax, где add_object_ajax это параметр action, который мы добавили в перехвате отправки формы, add_object - ф-я которую надо запустить
add_action('wp_ajax_add_object_ajax', 'add_object'); // если нужно чтобы вся бадяга работала для админов

function add_object() {
	$errors = ''; // сначала ошибок нет

	$nonce = $_POST['nonce']; // берем переданную формой строку проверки
	if ( ! wp_verify_nonce( $nonce, 'add_object' ) ) { // проверяем nonce код, второй параметр это аргумент из wp_create_nonce
		$errors .= 'Дані відправлені з неправильної сторінки '; // пишем ошибку
	}

	$title        = strip_tags( $_POST['post_title'] ); // запишем название поста
	$content      = wp_kses_post( $_POST['post_content'] ); // контент
	$username = strip_tags( $_POST['username'] ); // произвольное поле типа строка
	$email   = strip_tags( $_POST['email'] ); // произвольное поле типа мейл
	$ref_point   = strip_tags( $_POST['ref-point'] ); // произвольное поле типа мейл

	// проверим заполненность, если пусто добавим в $errors строку
	if ( ! $title ) {
		$errors .= 'Поле "Адреса:" не заповнено';
	}
	if ( ! $content ) {
		$errors .= 'Поле "Опишіть детальніше" не заповнено';
	}

	// далее проверим все ли нормально с картинками которые нам отправили
	if ( $_FILES['img'] ) { // если была передана миниатюра
		if ( $_FILES['img']['error'] ) {
			$errors .= "Помилка завантаження: " . $_FILES['img']['error'] . ". (" . $_FILES['img']['name'] . ") ";
		} // серверная ошибка загрузки
		$type = $_FILES['img']['type'];
		if ( ( $type != "image/jpg" ) && ( $type != "image/jpeg" ) && ( $type != "image/png" ) ) {
			$errors .= "Формат файлі може бути тільки jpg або png. (" . $_FILES['img']['name'] . ")";
		} // неверный формат
	}

	if ( ! $errors ) { // если с полями все ок, значит можем добавлять пост
		$fields  = array( // подготовим массив с полями поста, ключ это название поля, значение - его значение
			'post_type'    => 'pits', // нужно указать какой тип постов добавляем, у нас это my_custom_post_type
			'post_title'   => $title, // заголовок поста
			'post_content' => $content, // контент
		);
		$post_id = wp_insert_post( $fields ); // добавляем пост в базу и получаем его id

		update_field( 'field_5b000d08991ca', $username, $post_id);
		update_field( 'field_5b000d1d991cb', $email, $post_id);
		update_field( 'field_5b000d37991cd', $ref_point, $post_id);


		if ( $_FILES['img'] ) { // если основное фото было загружено
			$attach_id_img = media_handle_upload( 'img', $post_id ); // добавляем картинку в медиабиблиотеку и получаем её id
			update_post_meta( $post_id, '_thumbnail_id', $attach_id_img ); // привязываем миниатюру к посту
		}
	}

	if ($errors) wp_send_json_error($errors); // если были ошибки, выводим ответ в формате json с success = false и умираем
	else wp_send_json_success('Вашу скаргу прийнято до розгляду. Після розгляду вона буде опублікована. 
	Дякуємо за те, що не байдужі до нашого міста!'); // если все ок, выводим ответ в формате json с success = true и умираем

	die(); // умираем :)
}
