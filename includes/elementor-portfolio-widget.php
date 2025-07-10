<?php
class AsirWeb_Portfolio_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'asirweb_portfolio';
    }

    public function get_title() {
        return 'AsirWeb Portfolio';
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'Portfolio Item',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => 'Image',
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => 'Title',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Project Title',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => 'Description',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Short description of the project.',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '<div class="portfolio-card">';
        echo '<img src="' . esc_url($settings['image']['url']) . '" alt="' . esc_attr($settings['title']) . '">';
        echo '<h4>' . esc_html($settings['title']) . '</h4>';
        echo '<p>' . esc_html($settings['description']) . '</p>';
        echo '</div>';
    }
}