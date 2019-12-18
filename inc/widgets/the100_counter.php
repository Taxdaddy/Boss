<?php
/**
 * @package The100
 */
/**
 * Adds The100 counter Widgets.
 */
add_action('widgets_init', 'the100_register_counter_widget');

function the100_register_counter_widget() {
    register_widget('the100_counter');
}

class the100_counter extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'the100_counter', __('The100: Counter','the100'), array(
                'description' => __('A widget to add counters with font-awesome icons.', 'the100')
                )
            );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array('counter_layout' => array(
            'the100_widgets_name' => 'counter_layout',
            'the100_widgets_title' => __('Choose Layout', 'the100' ),
            'the100_widgets_field_type' => 'radio',
            'the100_widgets_field_options' => array('lay-one'=>__('Layout One','the100'),
                'lay-two'=>__('Layout Two','the100'),
                )));
        for($i=1;$i<=4;$i++){
            $field = array(
                'counter_title_'.$i => array(
                    'the100_widgets_name' => 'counter_title'.$i,
                    'the100_widgets_title' => __('Counter Title ', 'the100').$i,
                    'the100_widgets_field_type' => 'text',
                    ),
                'counter_icon'.$i => array(
                    'the100_widgets_name' => 'counter_icon'.$i,
                    'the100_widgets_title' => __('Counter Icon ','the100').$i.__(' Image', 'the100'),
                    'the100_widgets_field_type' => 'upload',
                    ),
                'counter_number'.$i => array(
                    'the100_widgets_name' => 'counter_number'.$i,
                    'the100_widgets_title' => __('Counter Number ', 'the100').$i,
                    'the100_widgets_field_type' => 'text',
                    )
                );
            $fields = array_merge($fields,$field);
        }

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args , $instance) {
        extract($args);
        if($instance != null){
            echo $before_widget;
            $counter_layout = $instance['counter_layout'];
            echo "<div class='widget-content-wrapper ".$counter_layout."'>";
            for($i=1;$i<=4;$i++){
                $counter_title = $instance['counter_title'.$i];
                $counter_icon = $instance['counter_icon'.$i];
                $counter_number = $instance['counter_number'.$i];
                if($counter_number!=''){
                    ?>
                    <div class="counter-wrap">
                        <div class="icon-title-wrap">
                            <?php if (!empty($counter_icon)){ ?>
                                <div class="counter-icon-img-wrap">
                                    <img src="<?php echo esc_url($counter_icon);?>" alt="<?php echo esc_attr($counter_title);?>">
                                </div>
                                <?php } ?>
                                <span class="counter-number"><?php echo esc_attr($counter_number); ?></span>
                            </div>
                            <h4><?php echo esc_html($counter_title);?></h4>
                        </div>
                        <?php
                    }
                }
                echo "</div>";
                echo $after_widget;
            }
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param   array   $new_instance   Values just sent to be saved.
         * @param   array   $old_instance   Previously saved values from database.
         *
         * @uses    the100_widgets_updated_field_value()        defined widgets-functions.php
         *
         * @return  array Updated safe values to be saved.
         */
        public function update($new_instance, $old_instance) {

            $widget_fields = $this->widget_fields();

            // Loop through fields
            foreach ($widget_fields as $widget_field) {

                extract($widget_field);
                // Use helper function to get updated field values
                $instance[$the100_widgets_name] = the100_widgets_updated_field_value($widget_field, $new_instance[$the100_widgets_name]);
            }

            return $instance;
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param   array $instance Previously saved values from database.
         *
         * @uses    the100_widgets_show_field()     defined widgets-functions.php
         */
        public function form($instance) {
            $widget_fields = $this->widget_fields();
            // Loop through fields
            foreach ($widget_fields as $widget_field) {
                // Make array elements available as variables
                extract($widget_field);
                $the100_widgets_field_value = isset($instance[$the100_widgets_name]) ? esc_attr($instance[$the100_widgets_name]) : '';
                the100_widgets_show_widget_field($this, $widget_field, $the100_widgets_field_value);
            }
        }

    }
    