<?php







	



	//FOR QUICK DEBUGGING



	





	if(!function_exists('pre')){

		function pre($data){

			if(isset($_GET['debug'])){

				pree($data);

			}

		}	 

	} 

		

	if(!function_exists('pree')){

	function pree($data){

				echo '<pre>';

				print_r($data);

				echo '</pre>';	

		

		}	 

	} 

	if(!function_exists('epn_within_cat')){
		function epn_within_cat(){
			$categories = get_the_category();
			$cats = array();
			if(!empty($categories)){
				foreach($categories as $cat){
					$cats[] = $cat->cat_ID;
				}
			}
			return $cats;
		}
	}

	if(!function_exists('epn_next_post')){

		

		function epn_next_post($posts_array, $current_id){	

			$return = array();

			$ready = false;

			if(!empty($posts_array)){

				foreach($posts_array as $posts){

					if($ready){

						$return = $posts;

						break;

					}

					if($posts->ID==$current_id){

						$ready = true;

					}

		

				}

			}

			return $return;

		}

	}

	

	if(!function_exists('epn_prev_post')){

		function epn_prev_post($posts_array, $current_id){	

			$return = array();

			$ready = false;

			if(!empty($posts_array)){

				foreach($posts_array as $posts){

					

					if($posts->ID!=$current_id){

						$return = $posts;				

					}else{

						break;

					}

					

		

				}

			}

			return $return;

		}

	}

	

	if(!function_exists('epn_prev_post_link')){

		function epn_prev_post_link($render=false, $link_text='Previous'){

			
			//pree($categories);exit;
			$args = array(

			'posts_per_page'   => -1,

			'post_type'        => get_post_type(),

			'post_status'      => 'publish',

			//'exclude'          => array(get_the_ID()),
			
			'orderby'          => 'title',

			'order'            => 'ASC',

			'tax_query' => array($tax_query));
			
			$categories = epn_within_cat();
			if(!empty($categories)){
				$args['category__in'] = $categories;
			}

			

			$link_text1 = epn_get('prev_text');

			$link_text = ($link_text1!=''?$link_text1:$link_text);

			

			

			

						

			$posts_array_all = get_posts( $args );

			

			$posts_array = epn_prev_post($posts_array_all, get_the_ID());

			

			if(empty($posts_array))

			$posts_array = end($posts_array_all);

			



			

			if(epn_get('enable_post_titles')==1){

				$link_text = $posts_array->post_title;				

			}

			

			$prev = sprintf('<a rel="prev" href="'.get_permalink($posts_array->ID).'">%s</a>', $link_text);

			

			if($render)

			echo $prev;

			else

			return $prev;

			

		}

	}

		

	if(!function_exists('epn_next_post_link')){

		function epn_next_post_link($render=false, $link_text='Next'){

			$args = array(

			'posts_per_page'   => -1,

			'post_type'        => get_post_type(),

			'post_status'      => 'publish',

			//'exclude'          => array(get_the_ID()),

			'orderby'          => 'title',

			'order'            => 'ASC',

			'tax_query' => array($tax_query));
			
			$categories = epn_within_cat();
			if(!empty($categories)){
				$args['category__in'] = $categories;
			}
			

			$link_text1 = epn_get('next_text');

			$link_text = ($link_text1!=''?$link_text1:$link_text);



			

			

			$posts_array_all = get_posts( $args );

			

			$posts_array = epn_next_post($posts_array_all, get_the_ID());

			

			if(empty($posts_array))

			$posts_array = current($posts_array_all);

			

			

			if(epn_get('enable_post_titles')==1){

				$link_text = $posts_array->post_title;				

			}

						

			$next = sprintf('<a rel="next" href="'.get_permalink($posts_array->ID).'">%s</a>', $link_text);

			

			if($render)

			echo $next;

			else

			return $next;			

			

		}

	}

	

	function epn_get($key){



		$options = get_option('epn_settings');

		$ret = (isset($options[$key])?$options[$key]:'');

		return $ret;

	}	

	



?>