<?php
/*
Plugin Name: Duende HTML Text Widget
Plugin URI: https://github.com/duende-us/html_text_widget_plugin
Description: Adds custom HTML to a widget area
Author: Barrett Cox
Author URI: http://barrettcox.com
Version: 1.0
*/


// Creating the widget 
class duende_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'duende_html_text', 

		// Widget name will appear in UI
		__('Duende HTML Text Widget', 'duende_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Adds custom HTML to a widget area', 'duende_widget_domain' ), 'classname' => 'duende_html_text' ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$html_text = $instance[ 'html_text' ];
		$css_id= $instance[ 'css_id' ];
		$css_classnames = $instance[ 'css_classnames' ];
	
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		?>

		<div <?php echo (isset( $instance[ 'css_classnames' ]) ? 'class='.$css_classnames : '');?> <?php echo (isset( $instance[ 'css_id' ]) ? 'id='.$css_id : '');?>>
		
		<?php

		// Display the output

		// Echo the title
		if ( ! empty( $title ) ) {
			echo '<h3 class="widget-title"><strong>';
			//echo $args['before_title'] . $title . $args['after_title'];
			echo $title;
			echo '</strong></h3>';

		}
		
		// Echo the HTML text
		if ( ! empty( $html_text ) ) {
			echo $html_text;
		}

		?>

		</div>	


		<?php
		echo $args['after_widget'];
	}
				
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
		}
		else {
		}

		if ( isset( $instance[ 'html_text' ] ) ) {
		$html_text = $instance[ 'html_text' ];
		}
		else {
		}

		if ( isset( $instance[ 'css_id' ] ) ) {
		$css_id = $instance[ 'css_id' ];
		}
		else {
		}

		if ( isset( $instance[ 'css_classnames' ] ) ) {
		$css_classnames = $instance[ 'css_classnames' ];
		}
		else {
		}

		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'html_text' ); ?>"><?php _e( 'HTML Text:' ); ?></label> 
		<textarea rows="14" class="widefat" id="<?php echo $this->get_field_id( 'html_text' ); ?>" name="<?php echo $this->get_field_name( 'html_text' ); ?>"><?php echo esc_attr( $html_text ); ?></textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'css_id' ); ?>"><?php _e( 'CSS ID:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'css_id' ); ?>" name="<?php echo $this->get_field_name( 'css_id' ); ?>" value="<?php echo esc_attr( $css_id ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'css_classnames' ); ?>"><?php _e( 'CSS Class:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'css_classnames' ); ?>" name="<?php echo $this->get_field_name( 'css_classnames' ); ?>" value="<?php echo esc_attr( $css_classnames ); ?>">
		</p>
		
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['html_text'] = ( ! empty( $new_instance['html_text'] ) ) ? $new_instance['html_text'] : '';
		$instance['css_id'] = ( ! empty( $new_instance['css_id'] ) ) ? strip_tags($new_instance['css_id']) : '';
		$instance['css_classnames'] = ( ! empty( $new_instance['css_classnames'] ) ) ? strip_tags($new_instance['css_classnames']) : '';
		return $instance;
	}

} // Class duende_widget ends here

// Register and load the widget
function duende_load_widget() {
	register_widget( 'duende_widget' );
}
add_action( 'widgets_init', 'duende_load_widget' );



/* Stop Adding Functions Below this Line */
?>