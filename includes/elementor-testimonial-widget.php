<?php
class AsirWeb_Testimonial_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'asirweb_testimonial';
    }

    public function get_title() {
        return 'AsirWeb Testimonial';
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'Content',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'testimonial_content',
            [
                'label' => 'Testimonial',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'This is a great service!',
            ]
        );

        $this->add_control(
            'client_name',
            [
                'label' => 'Client Name',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'John Doe',
            ]
        );

        $this->add_control(
            'client_company',
            [
                'label' => 'Company',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Company Name',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '<div class="asirweb-testimonial">';
        echo '<p>“' . esc_html($settings['testimonial_content']) . '”</p>';
        echo '<strong>' . esc_html($settings['client_name']) . '</strong> – ' . esc_html($settings['client_company']);
        echo '</div>';
    }
}