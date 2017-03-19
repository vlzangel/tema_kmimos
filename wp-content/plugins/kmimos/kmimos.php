<?php
/**
 * @package kmimos
 * @version 1.0
 *
 * Plugin Name: Kmimos
 * Description: Plugin para kmimos
 * Author:      Kmimos
 * Text Domain: kmimos  
 * Version:     1.0.0
 * License:     GPL2
 */

    if(!function_exists('kmimos_mails_administradores')){
        function kmimos_mails_administradores(){
            /*
                $headers[] = 'Cc: e.celli@kmimos.la';
                $headers[] = 'Cc: r.cuevas@kmimos.la';
                $headers[] = 'Cc: r.gonzalez@kmimos.la';
                $headers[] = 'Cc: m.castellon@kmimos.la';
            */
            $headers[] = 'Bcc: kmipruebas@vlz.com.ve';
            return $headers;
        }
    }

    if(!function_exists('kmimos_style')){
        function kmimos_style($styles = array()){
            $salida = "<style type='text/css'>";
            if( in_array("limpiar_tablas", $styles)){
                $salida .= "
                    table{
                        border: 0;
                        background-color: transparent !important;
                    }
                    table >thead >tr >th, table >tbody >tr >th, table >tfoot >tr >th, table >thead >tr >td, table >tbody >tr >td, table >tfoot >tr >td {
                        padding: 0px 10px 0px 0px;
                        line-height: 1.42857143;
                        vertical-align: top;
                        border-top: 0;
                        border-right: 0;
                        background: #FFF;
                    }
                ";
            }
            if( in_array("tablas", $styles)){
                $salida .= "
                    .vlz_titulos_superior{
                        font-size: 14px;
                        font-weight: 600;
                        padding: 5px 0px;
                        margin-bottom: 10px;
                        max-width: 350px;
                    }
                    .vlz_titulos_tablas{
                        background: #00d2b7;
                        font-size: 13px;
                        font-weight: 600;
                        padding: 5px;
                        color: #FFF;
                    }
                    .vlz_contenido_tablas{
                        padding: 5px;
                        border: solid 1px #CCC;
                        border-top: 0;
                        margin-bottom: 10px;
                    }
                    .vlz_tabla{
                        width: 100%;
                        margin-bottom: 40px;
                    }
                    .vlz_tabla strong{
                        font-weight: 600;
                    }
                    .vlz_tabla > th{
                        background: #59c9a8!important;
                        color: #FFF;
                        border-top: 1px solid #888;
                        border-right: 1px solid #888;
                        text-align: center;
                        vertical-align: top;
                    }
                    .vlz_tabla > tr > td{
                        border-top: 1px solid #888;
                        border-right: 1px solid #888;
                        vertical-align: top;
                    }
                ";
            }
            if( in_array("celdas", $styles)){
                $salida .= "
                    .cell25  {vertical-align: top; width: 25%; margin-right: -5px !important; padding-right: 10px !important; display: inline-block !important;}
                    .cell33  {vertical-align: top; width: 33.333333333%; margin-right: -5px !important; padding-right: 10px !important; display: inline-block !important;}
                    .cell50  {vertical-align: top; width: 50%; margin-right: -5px !important; padding-right: 10px !important; display: inline-block !important;}
                    .cell66  {vertical-align: top; width: 66.666666666%; margin-right: -5px !important; padding-right: 10px !important; display: inline-block !important;}
                    .cell75  {vertical-align: top; width: 75%; margin-right: -5px !important; padding-right: 10px !important; display: inline-block !important;}
                    .cell100 {vertical-align: top; width: 100%; margin-right: -5px !important; padding-right: 10px !important; display: inline-block !important;}

                    @media screen and (max-width: 700px){
                        .cell25 { width: 50%; }
                    }

                    @media screen and (max-width: 500px){
                        .cell25, .cell33, .cell50, .cell66, .cell75{ width: 100%; }
                    }
                ";
            }
            $salida .= "</style>";
            return $salida;
        }
    }

    add_action('admin_init','kmimos_load_language'); 
    add_action('init','kmimos_shortcode');
    add_action('admin_menu','kmimos_admin_menu');
    add_action('admin_init','kmimos_admin_init');
    add_action('admin_enqueue_scripts','kmimos_include_admin_scripts');
    add_action('wp_enqueue_scripts','kmimos_include_scripts');

    include_once('dashboard/petsitters.php');
    include_once('dashboard/pets.php');
    include_once('dashboard/requests.php');

    if(!function_exists('kmimos_load_language')){
        function kmimos_load_language() { 
            load_plugin_textdomain( 'kmimos', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
        }
    }

    /**
     *  Incluye las funciones de javascript en la página WEB bajo Wordpress
     * */

    if(!function_exists('kmimos_include_scripts')){
        function kmimos_include_scripts(){
            wp_enqueue_style( 'kmimos_style', plugins_url('css/kmimos.css', __FILE__) );
        }

    }

    /**
     *  Incluye las funciones de javascript en la página administrativa de Wordpress
     * */
    if(!function_exists('kmimos_include_admin_scripts')){
        function kmimos_include_admin_scripts(){
            // wp_enqueue_script( 'kmimos_script', plugins_url('javascript/kmimos-admin.js', __FILE__), array(), '1.0.0', true );
            wp_enqueue_style( 'kmimos_style', plugins_url('css/kmimos-admin.css', __FILE__) );
        }

    }

    /**
     *  Define la estructura de los menúes en el área administrativa
     * */
    if(!function_exists('kmimos_admin_menu')){
        function kmimos_admin_menu(){
            $opciones_menu_admin = array(
                array(
                    'title'=>'Kmimos',
                    'short-title'=>'Kmimos',
                    'parent'=>'',
                    'slug'=>'kmimos',
                    'access'=>'manage_options',
                    'page'=>'kmimos_panel',
                    'icon'=>plugins_url('/assets/images/icon.png', __FILE__),
                    'position'=>4,
                ),

                array(
                    'title'=> __('Dashboard'),
                    'short-title'=> __('Dashboard'),
                    'parent'=>'kmimos',
                    'slug'=>'kmimos',
                    'access'=>'manage_options',
                    'page'=>'kmimos_panel',
                    'icon'=>'',
                ),

                array(
                    'title'=> __('Settings'),
                    'short-title'=> __('Settings'),
                    'parent'=>'kmimos',
                    'slug'=>'kmimos-setup',
                    'access'=>'manage_options',
                    'page'=>'kmimos_setup',
                    'icon'=>'',
                ),

            );
            // Crea los links en el menú del panel de control
            foreach($opciones_menu_admin as $opcion){
                if($opcion['parent']==''){
                    add_menu_page($opcion['title'],$opcion['short-title'],$opcion['access'],$opcion['slug'],$opcion['page'],$opcion['icon'],$opcion['position']);
                } else{
                    add_submenu_page($opcion['parent'],$opcion['title'],$opcion['short-title'],$opcion['access'],$opcion['slug'],$opcion['page']);
                }
            }
        }
    }

    /**
     *  Se registran los campos a usar
     * */

    if(!function_exists('kmimos_admin_init')){
        function kmimos_admin_init(){
            register_setting('kmimos_group','kmimos_title_plugin');
            register_setting('kmimos_group','kmimos_description_plugin');
            register_setting('kmimos_group','kmimos_redirect_by_ip','intval');
            register_setting('kmimos_group','kmimos_notificar_por_email','intval');
        }
    }

    if(!function_exists('kmimos_panel')){
        function kmimos_panel(){
            if ( !current_user_can( 'manage_options' ) )  {
                wp_die( __( 'No tienes suficientes permisos para acceder a esta pagina.' ) );
            }
            include_once('dashboard/kmimos_panel.php');
        }
    }

    if(!function_exists('kmimos_setup')){
        function kmimos_setup(){
            if ( !current_user_can( 'manage_options' ) )  {
                wp_die( __( 'No tienes suficientes permisos para acceder a esta pagina.' ) );
            }
            include_once('dashboard/kmimos_setup.php');
        }
    }

    if(!function_exists('kmimos_shortcode')){
        function kmimos_shortcode(){
            add_shortcode('kmimos_search','kmimos_search_shortcode');
            add_shortcode('kmimos_rating','kmimos_rate_petsitter');
            add_shortcode('kmimos_request','kmimos_request_shortcode');
        }
    }

    if(!function_exists('kmimos_search_shortcode')){
        function kmimos_search_shortcode($args,$content){
            include_once('shortcodes/kmimos_search.php');
            return $content;
        }
    }

    if(!function_exists('kmimos_request_shortcode')){
        function kmimos_request_shortcode($args,$content){
            include_once('shortcodes/kmimos_request.php');
            return $content;
        }
    }

    if(!function_exists('kmimos_rate_petsitter')){
        function kmimos_rate_petsitter($args,$content){
            include_once('shortcodes/kmimos_rating.php');
            return $content;
        }
    }

    if(!function_exists('kmimos_get_valuations_of_petsitter')){
        function kmimos_get_valuations_of_petsitter($comment,$petsitter) {
            $html = '<div class="comments_valuations" style="display: inline-block; width: 100%;">';
            $html .= '  <div class="comment_valuation" style="width: 140px; float: left; margin:10px;">';
            $html .= '      <label style="margin-left:5px;"><strong>Cuidado</strong></label>';
            $html .=        kmimos_draw_rating(get_comment_meta( $comment, 'care', true ),1);
            $html .= '  </div>';
            $html .= '  <div class="comment_valuation" style="width: 140px; float: left; margin:10px;">';
            $html .= '      <label style="margin-left:5px;"><strong>Puntualidad</strong></label>';
            $html .=        kmimos_draw_rating(get_comment_meta( $comment, 'punctuality', true ),1);
            $html .= '  </div>';
            $html .= '  <div class="comment_valuation" style="width: 140px; float: left; margin:10px;">';
            $html .= '      <label style="margin-left:5px;"><strong>Limpieza</strong></label>';
            $html .=        kmimos_draw_rating(get_comment_meta( $comment, 'cleanliness', true ),1);
            $html .= '  </div>';
            $html .= '  <div class="comment_valuation" style="width: 140px; float: left; margin:10px;">';
            $html .= '      <label style="margin-left:5px;"><strong>Confianza</strong></label>';
            $html .=        kmimos_draw_rating(get_comment_meta( $comment, 'trust', true ),1);
            $html .= '  </div>';
            $html .= '</div>';
            $html .= '<div class="clr"></div>';
            return $html;
        }
    }

    if(!function_exists('kmimos_get_over_price')){
        function kmimos_get_over_price(){
            return 1.2;
        }
    }

    if(!function_exists('get_referred_list_options')){
        function get_referred_list_options(){
            $opciones = array(
                'Volaris'       =>  'Volaris',
                'Facebook'      =>  'Facebook',
                'Adwords'       =>  'Buscador de Google',
                'Instagram'     =>  'Instagram',
                'Twitter'       =>  'Twitter',
                'Booking.com'   =>  'Booking.com',
                'Cabify'        =>  'Cabify',
                'Bancomer'      =>  'Bancomer',
                'Mexcovery'     =>  'Mexcovery',
                'Totems'        =>  'Totems',
                'Groupon'       =>  'Groupon',
                'Agencia IQPR'  =>  'Agencia IQPR',
                'Revistas o periodicos' =>  'Revistas o periodicos',
                'Vintermex'             =>  'Vintermex',
                'Otros'                 =>  'Otros',
            );
            return $opciones;
        }
    }

    if(!function_exists('kmimos_get_my_services')){
        function kmimos_get_my_services($user_id){
            global $wpdb;
            $sql = "SELECT COUNT(*) AS count, GROUP_CONCAT(ID SEPARATOR ',') AS list FROM wp_posts WHERE post_type = 'product' AND post_author='{$user_id}' ";
            return $wpdb->get_row($sql, ARRAY_A);
        }
    }

    if(!function_exists('kmimos_user_info_ready')){
        function kmimos_user_info_ready($user_id){
            $nombre = get_user_meta($user_id,'first_name',true);
            $apellido = get_user_meta($user_id,'last_name',true);
            $local = get_user_meta($user_id,'user_phone',true);
            $movil = get_user_meta($user_id,'user_mobile',true);
            if ($local!='' || $movil!='') {
                $telefono= true;
            }else{
                $telefono= false;
            }
            $ready = ($nombre!='' && $apellido!='' && $telefono==true );
            return $ready;
        }
    }

    if(!function_exists('kmimos_get_petsitter_services_categories')){
        function kmimos_get_petsitter_services_categories($petsitter_id){
            global $wpdb;
            $sql = "SELECT COUNT(*) AS count, GROUP_CONCAT(t.term_id SEPARATOR ',') AS list, ";
            $sql .= "GROUP_CONCAT(t.name SEPARATOR ',') AS services ";
            $sql .= "FROM $wpdb->posts AS pr LEFT JOIN $wpdb->posts AS ps ON pr.post_parent=ps.ID ";
            $sql .= "LEFT JOIN $wpdb->term_relationships AS tr ON pr.ID=tr.object_id ";
            $sql .= "LEFT JOIN $wpdb->terms AS t ON t.term_id=tr.term_taxonomy_id ";
            $sql .= "LEFT JOIN $wpdb->term_taxonomy AS tt ON tt.term_taxonomy_id=tr.term_taxonomy_id ";
            $sql .= "WHERE pr.post_type = 'product' AND pr.post_status = 'publish' ";
            $sql .= "AND tt.taxonomy = 'product_cat' AND ps.ID = ".$petsitter_id;       
            return $wpdb->get_row($sql, ARRAY_A);
        }
    }

    if(!function_exists('kmimos_get_service_info')){
        function kmimos_get_service_info($service_id){
            global $wpdb;
            $transporte = array(
                'name' => 'Servicios de Transportación (precio por grupo)',
                'description' => 'Rutas Cortas de 0 a 5Km
Rutas Medias de 5 a 10Km
Rutas Largas de 10 a 15Km',
                'type' => 'select',
                'position' => 0,
                'options' => array(
                    '0' => array(
                        'label' => 'Transp. Sencillo - Rutas Cortas',
                        'price' => '',
                        'min' => '',
                        'max' => ''
                    ),
                    '1' => array(
                        'label' => 'Transp. Sencillo - Rutas Medias',
                        'price' => '',
                        'min' => '',
                        'max' => ''
                    ),
                    '2' => array(
                        'label' => 'Transp. Sencillo - Rutas Largas',
                        'price' => '',
                        'min' => '',
                        'max' => ''
                    ),
                    '3' => array(
                        'label' => 'Transp. Redondo - Rutas Cortas',
                        'price' => '',
                        'min' => '',
                        'max' => ''
                    ),
                    '4' => array(
                        'label' => 'Transp. Redondo - Rutas Medias',
                        'price' => '',
                        'min' => '',
                        'max' => ''
                    ),
                    '5' => array(
                        'label' => 'Transp. Redondo - Rutas Largas',
                        'price' => '',
                        'min' => '',
                        'max' => ''
                    )
                ),
                'required' => 0,
                'wc_booking_person_qty_multiplier' => 0,
                'wc_booking_block_qty_multiplier' => 0
            );
            $adicionales = array(
                'name' => 'Servicios Adicionales (precio por mascota)',
                'description' => '',
                'type' => 'checkbox',
                'position' => 1,
                'options' => array (
                    '0' => array (
                        'label' => 'Baño (precio por mascota)',
                        'price' => '',
                        'min' => '',
                        'max' => ''
                    ),
                    '1' => array (
                        'label' => 'Corte de Pelo y Uñas (precio por mascota)',
                        'price' => '',
                        'min' => '',
                        'max' => ''
                    ),
                    '2' => array (
                        'label' => 'Visita al Veterinario (precio por mascota)',
                        'price' => '',
                        'min' => '',
                        'max' => ''
                    ),
                    '3' => array (
                        'label' => 'Limpieza Dental (precio por mascota)',
                        'price' => '',
                        'min' => '',
                        'max' => ''
                    ),
                    '4' => array (
                        'label' => 'Acupuntura (precio por mascota)',
                        'price' => '',
                        'min' => '',
                        'max' => ''
                    )
                ),
                'required' => 0,
                'wc_booking_person_qty_multiplier' => 1,
                'wc_booking_block_qty_multiplier' => 0
            );
            if($service_id!='') {
                $parent_cat = 2588;
                $sql = "SELECT sv.ID, GROUP_CONCAT(tr.term_taxonomy_id SEPARATOR ',') AS category, sv.post_title AS title, ";
                $sql .= "sv.post_excerpt AS short, (SELECT GROUP_CONCAT(ID SEPARATOR ',') FROM $wpdb->posts ";
                $sql .= "WHERE post_type='bookable_person' AND post_parent=sv.ID) AS sizes, cp.meta_value AS capacity, ";
                $sql .= "ad.meta_value AS addons ";
                $sql .= "FROM $wpdb->posts AS sv LEFT JOIN $wpdb->term_relationships AS tr ON tr.object_id=sv.ID ";
                $sql .= "LEFT JOIN $wpdb->term_taxonomy AS tt ON tt.term_taxonomy_id=tr.term_taxonomy_id ";
                $sql .= "LEFT JOIN $wpdb->postmeta AS cp ON (sv.ID=cp.post_id AND cp.meta_key='_wc_booking_max_persons_group') ";
                $sql .= "LEFT JOIN $wpdb->postmeta AS ad ON (sv.ID=ad.post_id AND ad.meta_key='_product_addons') ";
                $sql .= "WHERE tt.parent = $parent_cat AND sv.ID = ".$service_id;
                $services = $wpdb->get_row($sql, ARRAY_A);
                $addons = unserialize($services['addons']);
                foreach($addons as $addon){
                    switch($addon['name']){
                        case 'Servicios de Transportación (precio por grupo)':
                            foreach($addon['options'] as $key=>$option){
                                switch($option['label']){
                                    case 'Transp. Sencillo - Rutas Cortas':
                                        $transporte['options'][0]['price']=$option['price'];
                                    break;
                                    case 'Transp. Sencillo - Rutas Medias':
                                        $transporte['options'][1]['price']=$option['price'];
                                    break;
                                    case 'Transp. Sencillo - Rutas Largas':
                                        $transporte['options'][2]['price']=$option['price'];
                                    break;
                                    case 'Transp. Redondo - Rutas Cortas':
                                        $transporte['options'][3]['price']=$option['price'];
                                    break;
                                    case 'Transp. Redondo - Rutas Medias':
                                        $transporte['options'][4]['price']=$option['price'];
                                    break;
                                    case 'Transp. Redondo - Rutas Largas':
                                        $transporte['options'][5]['price']=$option['price'];
                                    break;

                                }

                            }
                        break;
                        case 'Servicios Adicionales (precio por mascota)':
                            foreach($addon['options'] as $key=>$option){
                                switch($option['label']){
                                    case 'Baño (precio por mascota)':
                                        $adicionales['options'][0]['price']=$option['price'];
                                    break;
                                    case 'Corte de Pelo y Uñas (precio por mascota)':
                                        $adicionales['options'][1]['price']=$option['price'];
                                    break;
                                    case 'Visita al Veterinario (precio por mascota)':
                                        $adicionales['options'][2]['price']=$option['price'];
                                    break;
                                    case 'Limpieza Dental (precio por mascota)':
                                        $adicionales['options'][3]['price']=$option['price'];
                                    break;
                                    case 'Acupuntura (precio por mascota)':
                                        $adicionales['options'][4]['price']=$option['price'];
                                    break;
                                }
                            }
                        break;
                    }
                }
            }
            $services['addons']=serialize(array('0'=>$transporte,'1'=>$adicionales));
            return $services;
        }
    }

    if(!function_exists('kmimos_get_detail_for_size')){

        function kmimos_get_detail_for_size($size_id){
            global $wpdb;
            $sql = "SELECT sz.ID, (pb.meta_value+pz.meta_value) AS price, sz.post_title AS title, sz.post_status AS status ";
            $sql .= "FROM $wpdb->posts AS sz LEFT JOIN $wpdb->postmeta AS pz ON (sz.ID=pz.post_id AND pz.meta_key='block_cost') ";
            $sql .= "LEFT JOIN $wpdb->postmeta AS pb ON (sz.post_parent=pb.post_id AND pb.meta_key='_wc_booking_base_cost') ";
            $sql .= "WHERE sz.ID = ".$size_id;
            return $wpdb->get_row($sql);
        }
    }

    if(!function_exists('kmimos_get_my_pets')){
        function kmimos_get_my_pets($user_id){
            global $wpdb;
            $sql  = "SELECT COUNT(*) AS count, GROUP_CONCAT(p.ID SEPARATOR ',') AS list, ";
            $sql .= "GROUP_CONCAT(pn.meta_value SEPARATOR ',') AS names ";
            $sql .= "FROM $wpdb->posts AS p  ";
            $sql .= "LEFT JOIN $wpdb->postmeta AS pm ON (p.ID=pm.post_id AND pm.meta_key='owner_pet') ";
            $sql .= "LEFT JOIN $wpdb->postmeta AS pn ON (p.ID=pn.post_id AND pn.meta_key='name_pet') ";
            $sql .= "WHERE p.post_type = 'pets' AND p.post_status = 'publish' ";
            $sql .= "AND pm.meta_value = ".$user_id;
            return $wpdb->get_row($sql, ARRAY_A);
        }
    }

    if(!function_exists('kmimos_get_my_favorites')){
        function kmimos_get_my_favorites($user_id){
            global $wpdb;
            $sql = "SELECT ";
            $sql .= "IFNULL((SELECT IF(LENGTH(f.meta_value)>2,LENGTH(f.meta_value)-LENGTH(REPLACE(f.meta_value,',',''))+1,0) ";
            $sql .= "FROM $wpdb->usermeta AS f WHERE f.meta_key='user_favorites' AND f.user_id = $user_id),0) AS count, ";
            $sql .= "IFNULL((SELECT IF(LENGTH(u.meta_value)>2,SUBSTRING(REPLACE(SUBSTRING_INDEX(u.meta_value,']',1),'\"',''),2),'') ";
            $sql .= "FROM $wpdb->usermeta AS u WHERE u.meta_key='user_favorites' AND u.user_id = $user_id),'') AS list";
            return $wpdb->get_row($sql, ARRAY_A);
        }
    }

    if(!function_exists('kmimos_get_categories_of_services')){
        function kmimos_get_categories_of_services(){
            global $wpdb;
            $parent_cat = 2588;
            $sql = "SELECT tm.term_id AS ID, tm.name ";
            $sql .= "FROM $wpdb->term_taxonomy AS tx  ";
            $sql .= "LEFT JOIN $wpdb->terms AS tm ON tx.term_id=tm.term_id ";
            $sql .= "WHERE tx.parent = ".$parent_cat;
            return $wpdb->get_results($sql);
        }
    }

    if(!function_exists('kmimos_get_product_models_of_services')){
        function kmimos_get_product_models_of_services(){
            $args = array(
                'posts_per_page' => -1,
                'post_type' =>'product_model',
                'orderby' => 'title',
                'order' => 'ASC',
                'post_status' => 'publish'
            );
            return get_posts( $args );
        }
    }

    if(!function_exists('kmimos_get_types_of_pets')){
        function kmimos_get_types_of_pets(){
            global $wpdb;
            $sql = "SELECT tm.term_id AS ID, tm.name ";
            $sql .= "FROM $wpdb->term_taxonomy AS tx  ";
            $sql .= "LEFT JOIN $wpdb->terms AS tm ON tx.term_id=tm.term_id ";
            $sql .= "WHERE tx.taxonomy = 'pets-types'";
            return $wpdb->get_results($sql);
        }
    }

    if(!function_exists('kmimos_get_sizes_of_pets')){
        function kmimos_get_sizes_of_pets(){
            $sizes =array(
                0=> array('ID'=>0,'name'=>'Pequeñas','desc'=>'Menos de 25.4cm'),
                1=> array('ID'=>1,'name'=>'Medianas','desc'=>'Más de 25.4cm y menos de 50.8cm'),
                2=> array('ID'=>2,'name'=>'Grandes','desc'=>'Más de 50.8cm y menos de 76.2cm'),
                3=> array('ID'=>3,'name'=>'Gigantes','desc'=>'Más de 76.2cm')
            );
            return $sizes;
        }
    }

    if(!function_exists('kmimos_get_genders_of_pets')){
        function kmimos_get_genders_of_pets(){
            $genders =array(
                array('ID'=>1,'name'=>'Machos','singular'=>'Macho'),
                array('ID'=>2,'name'=>'Hembras','singular'=>'Hembra')
            );
            return $genders;
        }
    }

    if(!function_exists('kmimos_draw_rating')){
        function kmimos_draw_rating($rating, $votes){
            $html = '';
            if($votes =='' || $votes == 0 || $rating ==''){ 
                $html .= '<div id="rating">';
                for ($i=0; $i<5; $i++){ 
                    $html .= '<img src="https://kmimos.com.mx/wp-content/plugins/kmimos/assets/rating/vacio.png">';
                }
                $html .= '</div>';
                $html .= '<div style="clear:both"><sup>Este cuidador no ha sido valorado</sup></div>';
            }else{ 
                $html .= '<div id="rating">';
                for ($i=0; $i<5; $i++){ 
                    if(intval($rating)>$i) { 
                        $html .= '<img src="https://kmimos.com.mx/wp-content/plugins/kmimos/assets/rating/100.png">';
                    }else if(intval($rating)<$i) {
                        $html .= '<img src="https://kmimos.com.mx/wp-content/plugins/kmimos/assets/rating/0.png">';
                    }else{
                        $residuo = ($rating-$i)*100+12.5;
                        $residuo = intval($residuo/25);
                        switch($residuo){
                            case 3: // 75% 
                                $html .= '<img src="https://kmimos.com.mx/wp-content/plugins/kmimos/assets/rating/75.png">';
                            break;
                            case 2: // 50% 
                                $html .= '<img src="https://kmimos.com.mx/wp-content/plugins/kmimos/assets/rating/50.png">';
                            break;
                            case 3: // 25% 
                                $html .= '<img src="https://kmimos.com.mx/wp-content/plugins/kmimos/assets/rating/25.png">';
                            break;
                            default: // 0% 
                                $html .= '<img src="https://kmimos.com.mx/wp-content/plugins/kmimos/assets/rating/0.png">';
                            break;
                        }
                    }
                }
                $html .= '</div>';
            }
            return $html;
        }
    }

    if(!function_exists('kmimos_petsitter_rating_and_votes')){
        function kmimos_petsitter_rating_and_votes($post_id){
            global $wpdb;
            $r = $wpdb->get_row("SELECT rating, valoraciones FROM cuidadores WHERE id_post = ".$post_id);
            $rating = $r->rating;
            $votes  = $r->valoraciones;
            return array('rating'=>$rating, 'votes'=>$votes);
        }
    }

    if(!function_exists('vlz_actualizar_ratings')){
        function vlz_actualizar_ratings($post_id){
            $valoracion=array();
            $comments = get_comments(array( 'post_id' => $post_id ) );
            $rating=0;
            $votes=0;
            if(count($comments)>0){
                $list = array();
                foreach($comments as $comment){
                    $care = get_comment_meta( $comment->comment_ID, 'care', true );
                    $punctuality = get_comment_meta( $comment->comment_ID, 'punctuality', true );
                    $cleanliness = get_comment_meta( $comment->comment_ID, 'cleanliness', true );
                    $trust = get_comment_meta( $comment->comment_ID, 'trust', true );
                    if($care != 0 || $punctuality != 0 || $cleanliness != 0 || $trust != 0) {
                        $votes++;
                        $items = 0;
                        $mean = 0;
                        if($care != 0){
                            $items++;
                            $mean += $care;
                        }
                        if($punctuality != 0){
                            $items++;
                            $mean += $punctuality;
                        }
                        if($cleanliness != 0){
                            $items++;
                            $mean += $cleanliness;
                        }
                        if($trust != 0){
                            $items++;
                            $mean += $trust;
                        }
                        $rating += $mean/$items;
                    }
                }
                if( $votes > 0){
                    $rating = $rating/$votes;
                }else{
                    $rating = 0;
                }
            }else{
                $rating = 0;
                $votes = 0;
            }
            global $wpdb;
            $wpdb->query("UPDATE cuidadores SET rating = '".$rating."', valoraciones = '".$votes."' WHERE id_post = ".$post_id);
        }
    }

    if(!function_exists('kmimos_petsitter_rating')){
        function kmimos_petsitter_rating($post_id){
            $html = '<div class="text-center rating">';
            $valoracion = kmimos_petsitter_rating_and_votes($post_id);
            $votes = $valoracion['votes'];
            $rating = $valoracion['rating'];
            if($votes =='' || $votes == 0 || $rating ==''){ 
                $html .= '<div id="rating">';
                for ($i=0; $i<5; $i++){ 
                    $html .= '<img src="'.get_home_url().'/wp-content/plugins/kmimos/assets/rating/vacio.png">';
                }
                $html .= '</div>';
                $html .= '<div class="vlz_valoraciones">Este cuidador no ha sido valorado</div>';
            } else { 
                $html .= '<div id="rating">';
                for ($i=0; $i<5; $i++){ 
                    if(intval($rating)>$i) { 
                        $html .= '<img src="'.get_home_url().'/wp-content/plugins/kmimos/assets/rating/100.png">';
                    } else if(intval($rating)<$i) {
                        $html .= '<img src="'.get_home_url().'/wp-content/plugins/kmimos/assets/rating/0.png">';
                    } else {
                        $residuo = ($rating-$i)*100+12.5;
                        $residuo = intval($residuo/25);
                        switch($residuo){
                            case 4: // 100% 
                                $html .= '<img src="'.get_home_url().'/wp-content/plugins/kmimos/assets/rating/100.png">';
                            break;
                            case 3: // 75% 
                                $html .= '<img src="'.get_home_url().'/wp-content/plugins/kmimos/assets/rating/75.png">';
                            break;
                            case 2: // 50% 
                                $html .= '<img src="'.get_home_url().'/wp-content/plugins/kmimos/assets/rating/50.png">';
                            break;
                            case 1: // 25% 
                                $html .= '<img src="'.get_home_url().'/wp-content/plugins/kmimos/assets/rating/25.png">';
                            break;
                            default: // 0% 
                                $html .= '<img src="'.get_home_url().'/wp-content/plugins/kmimos/assets/rating/0.png">';
                            break;
                        }
                    }
                }
                $html .= '</div>';
                $valoracion = ($votes==1)? ' Valoración':' Valoraciones';
                $html .= '<div class="vlz_valoraciones">('. number_format($rating,2).') '.$votes .$valoracion. '</div>';
            }
            $html .= '</div>';
            return $html;
        }
    }

    if(!function_exists('kmimos_upload_photo')){
        function kmimos_upload_photo( $name, $pathDestino, $fieldName, $file, $width=800, $heigth=600 ) {
            $file = $_FILES;
            $ext = pathinfo($file[$fieldName]['name'], PATHINFO_EXTENSION);
            $size = $file[$fieldName]['size'];
            $fullpath = "{$pathDestino}{$name}.{$ext}";
            if( move_uploaded_file($file[$fieldName]['tmp_name'], $fullpath) ) { 
                $gis = getimagesize( $fullpath );
                $type = $gis[2];              
                switch($type){
                    case "1": $imorig = @imagecreatefromgif($fullpath); break;
                    case "2": $imorig = @imagecreatefromjpeg($fullpath);break;
                    case "3": $imorig = @imagecreatefrompng($fullpath); break;   
                    default:  $imorig = @imagecreatefromjpeg($fullpath);
                }
                $x = imagesx($imorig);
                $y = imagesy($imorig);
                $aw = $width;
                $ah = $heigth;
                $im = imagecreatetruecolor($aw,$ah);
                if (imagecopyresampled($im, $imorig, 0, 0, 0, 0, $aw, $ah, $x, $y)){
                    imagejpeg($im, $fullpath);
                }
                return [
                    'path'=>$fullpath, 
                    'name'=>"{$name}.{$ext}", 
                    'sts'=>true
                ];
            }else{
                return ['sts'=>false];
            }
        }
    }

    if(!function_exists('kmimos_get_my_bookings')){
        function kmimos_get_my_bookings($user_id){
            global $wpdb;
            $services = kmimos_get_my_services($user_id);
            $sql = "
                SELECT 
                    COUNT(*) AS count
                FROM 
                    $wpdb->posts AS posts
                LEFT JOIN $wpdb->postmeta AS metas    ON (metas.meta_key='_booking_product_id' AND metas.meta_value=posts.ID)
                LEFT JOIN $wpdb->posts    AS reservas ON (reservas.ID=metas.post_id)
                LEFT JOIN $wpdb->posts    AS orden ON (orden.ID=reservas.post_parent)
                WHERE 
                    posts.post_author       = {$user_id} AND 
                    posts.post_type         = 'product' AND
                    reservas.post_status    != 'was-in-cart' AND
                    orden.post_status       != 'wc-pending'";
            return $wpdb->get_row($sql, ARRAY_A);
        }
    }

    include_once('kmimos-email.php');

?>

