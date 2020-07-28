<?php

if (!function_exists('show_active_menu')) {
	 
	 function show_active_menu($slug) {

	 	$ci=& get_instance();

                $result = "";

                // for main page
                if ($slug === 0 && $ci->uri->segment(1, 0) === 0) {
                	$result = "class='active'";
                }

                if ($slug === 'serials' && $ci->uri->segment(3, 0) === 'serials') {
                	$result = "class='active'";
                }

                if ($slug === 'films' && $ci->uri->segment(3, 0) === 'films') {
                        $result = "class='active'";
                } 

                if ($slug === $ci->uri->segment(1, 0)) {
                        $result = "class='active'";
                }

                if ($slug === 'ratings' && $ci->uri->segment(2, 0) === 'view' && $ci->uri->segment(3, 0) === 0) {
                        $result = "class='active'";
                }

                if ($slug === 0 && $ci->uri->segment(1, 0) === 'news' && $ci->uri->segment(2, 0) === 'view') {
                        $result = "class='active'";
                }

                if ($slug === 0 && $ci->uri->segment(1, 0) === 'posts') {
                        $result = "class='active'";
                }

              

                return $result;
	 }

}

if (!function_exists('show_active_meny_byFilmId')) {

         function show_active_meny_byFilmId($slug){

                 $ci=& get_instance();

                 $result = "";

                  if ($slug === 'isActive' && $ci->uri->segment(1, 0) === 'movies' && $ci->uri->segment(2, 0) === 'view') {
                         $result = "class='active'";
                  }

                  return $result;

         }

}

if (!function_exists('get_user_by_id')) {
          
          function get_user_by_id($user_id){

            $ci=& get_instance();
            $ci->load->model('dx_auth/users');
            $query = $ci->users->get_user_by_id($user_id);
            $result = $query->row();

            return $result;

      }
}

