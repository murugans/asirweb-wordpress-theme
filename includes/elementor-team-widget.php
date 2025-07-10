<?php
class AsirWeb_Team_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'asirweb_team';
    }

    public function get_title() {
        return 'AsirWeb Team Member';
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'Team Member',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'name',
            [
                'label' => 'Name',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'John Doe',
            ]
        );

        $this->add_control(
            'position',
            [
                'label' => 'Position',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Developer',
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => 'Photo',
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'bio',
            [
                'label' => 'Bio',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Short bio about the team member.',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '<div class="team-member">';
        echo '<img src="' . esc_url($settings['image']['url']) . '" alt="' . esc_attr($settings['name']) . '">';
        echo '<h4>' . esc_html($settings['name']) . '</h4>';
        echo '<p class="position">' . esc_html($settings['position']) . '</p>';
        echo '<p>' . esc_html($settings['bio']) . '</p>';
        echo '</div>';
    }
}