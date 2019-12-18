<?php
/**
 * @package The100
 */
function the100_widgets_show_widget_field($instance = '', $widget_field = '', $athm_field_value = '') {

    extract($widget_field);

    switch ($the100_widgets_field_type) {

        // Standard text field
        case 'text' :
        ?>
        <p>
            <label for="<?php echo esc_attr($instance->get_field_id($the100_widgets_name)); ?>"><?php echo esc_html($the100_widgets_title); ?>:</label>
            <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($the100_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($the100_widgets_name)); ?>" type="text" value="<?php echo esc_attr($athm_field_value) ; ?>" />

            <?php if (isset($the100_widgets_description)) { ?>
            <br />
            <small><?php echo esc_html($the100_widgets_description); ?></small>
            <?php } ?>
        </p>
        <?php
        break;

        case 'number' :
        ?>
        <p>
            <label for="<?php echo esc_attr($instance->get_field_id($the100_widgets_name)); ?>"><?php echo esc_html($the100_widgets_title); ?>:</label><br />
            <input name="<?php echo esc_attr($instance->get_field_name($the100_widgets_name)); ?>" type="number" step="1" min="1" id="<?php echo esc_attr($instance->get_field_id($the100_widgets_name)); ?>" value="<?php echo esc_attr($athm_field_value); ?>" class="small-text" />

            <?php if (isset($the100_widgets_description)) { ?>
            <br />
            <small><?php echo esc_html($the100_widgets_description); ?></small>
            <?php } ?>
        </p>
        <?php
        break;

        
        // Standard url field
        case 'url' :
        ?>
        <p>
            <label for="<?php echo esc_attr($instance->get_field_id($the100_widgets_name)); ?>"><?php echo esc_html($the100_widgets_title); ?>:</label>
            <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($the100_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($the100_widgets_name)); ?>" type="text" value="<?php echo esc_attr($athm_field_value); ?>" />

            <?php if (isset($the100_widgets_description)) { ?>
            <br />
            <small><?php echo esc_html($the100_widgets_description); ?></small>
            <?php } ?>
        </p>
        <?php
        break;

        // Textarea field
        case 'textarea' :
        ?>
        <p>
            <label for="<?php echo esc_attr($instance->get_field_id($the100_widgets_name)); ?>"><?php echo esc_html($the100_widgets_title); ?>:</label>
            <textarea class="widefat" rows="5" id="<?php echo esc_attr($instance->get_field_id($the100_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($the100_widgets_name)); ?>"><?php echo wp_kses_post($athm_field_value); ?></textarea>
        </p>
        <?php
        break;

        // Radio fields
        case 'radio' :
        ?>
        <p>
            <?php
            echo esc_html($the100_widgets_title);
            echo '<br />';
            foreach ($the100_widgets_field_options as $athm_option_name => $athm_option_title) {
                ?>
                <input id="<?php echo esc_attr($instance->get_field_id($athm_option_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($the100_widgets_name)); ?>" type="radio" value="<?php echo esc_attr($athm_option_name); ?>" <?php checked($athm_option_name, $athm_field_value); ?> />
                <label for="<?php echo esc_attr($instance->get_field_id($athm_option_name)); ?>"><?php echo esc_html($athm_option_title); ?></label>
                <br />
                <?php } ?>

                <?php if (isset($the100_widgets_description)) { ?>
                <small><?php echo esc_html($the100_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

            case 'upload' :

            $output = '';
            $id = esc_attr($instance->get_field_id($the100_widgets_name));
            $class = '';
            $int = '';
            $value = esc_url($athm_field_value);
            $name = esc_attr($instance->get_field_name($the100_widgets_name));


            if ($value) {
                $class = ' has-file';
            }
            $output .= '<div class="sub-option section widget-upload">';
            $output .= '<label for="'.esc_attr($id).'">'.esc_html($the100_widgets_title).'</label><br/>';
            $output .= '<input id="' . esc_attr($id) . '" class="upload' . esc_attr($class) . '" type="text" name="' . esc_attr($name) . '" value="' . esc_attr($value) . '" placeholder="' . __('No file chosen', 'the100') . '" />' . "\n";
            if (function_exists('wp_enqueue_media')) {
                if (( $value == '')) {
                    $output .= '<input id="upload-' . esc_attr($id) . '" class="upload-button-wdgt button" type="button" value="' . __('Upload', 'the100') . '" />' . "\n";
                } else {
                    $output .= '<input id="remove-' . esc_attr($id) . '" class="remove-file button" type="button" value="' . __('Remove', 'the100') . '" />' . "\n";
                }
            } else {
                $output .= '<p><i>' . __('Upgrade your version of WordPress for full media support.', 'the100') . '</i></p>';
            }

            $output .= '<div class="screenshot team-thumb" id="' . esc_attr($id) . '-image">' . "\n";
            if ($value != '') {
                $image = preg_match('/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value);
                if ($image) {
                    $output .= '<img src="' . esc_url($value) . '" alt="" /><a class="remove-image">'.__('Remove','the100').'</a>';
                } else {
                    $parts = explode("/", $value);
                    for ($i = 0; $i < sizeof($parts); ++$i) {
                        $title = $parts[$i];
                    }

                    // No output preview if it's not an image.
                    $output .= '';

                    // Standard generic output if it's not an image.
                    $title = __('View File', 'the100');
                    $output .= '<div class="no-image"><span class="file_link"><a href="' . esc_url($value) . '" target="_blank" rel="external">' . wp_kses_post($title) . '</a></span></div>';
                }
            }
            $output .= '</div></div>' . "\n";
            echo ($output);
            break;

        }
    }

    function the100_widgets_updated_field_value($widget_field, $new_field_value) {

        extract($widget_field);

    // Allow only integers in number fields
        if ($the100_widgets_field_type == 'number') {
            return absint($new_field_value);
        }
        elseif ($the100_widgets_field_type == 'textarea') {
        // Check if field array specifed allowed tags
            if (!isset($the100_widgets_allowed_tags)) {
            // If not, fallback to default tags
                $the100_widgets_allowed_tags = '<p><strong><em><a><h2><img><span>';
            }
            return wp_strip_all_tags($new_field_value, $the100_widgets_allowed_tags);
        // No allowed tags for all other fields
        }
        elseif ($the100_widgets_field_type == 'url') {
            return esc_url_raw($new_field_value);
        }
        else {
            return wp_strip_all_tags($new_field_value);
        }
    }

    if(is_admin()):
    /**
     * Enqueue scripts for file uploader
     */
    function the100_widgets_media_scripts($hook) {
        wp_enqueue_style( 'the100-admin-style', get_template_directory_uri() . '/css/admin-style.css' );
        if ( 'customize.php' == $hook || 'widgets.php' == $hook ) {
            if (function_exists('wp_enqueue_media'))
                wp_enqueue_media();

            wp_register_script('the100-admin-scripts', get_template_directory_uri() . '/js/admin-scripts.js', array('jquery'), 1.0,true);
            wp_enqueue_script('the100-admin-scripts');
            wp_localize_script('the100-admin-scripts', 'the100Uploader', array(
                'upload' => __('Upload', 'the100'),
                'remove' => __('Remove', 'the100')
            ));
        }
        else{
            return;
        }
    }

    add_action('admin_enqueue_scripts', 'the100_widgets_media_scripts');
endif;

require get_template_directory() . '/inc/widgets/the100_cta.php'; 
require get_template_directory() . '/inc/widgets/the100_counter.php'; 