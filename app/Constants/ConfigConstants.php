<?php

namespace App\Constants;

class ConfigConstants
{
  public const OVERRIDABLE_CONFIGS = [
    // correspond to laravel config keys
    'app.name',
    'app.description',
    'app.support_email',
    'app.date_format',
    'app.datetime_format',
    'app.analytics_providers',

    // chat bots
    'app.chatbot_code_snippet',

    // social links
    'app.social_links',

    // recaptcha
    'app.recaptcha_enabled',
    'recaptcha.api_site_key',
    'recaptcha.api_secret_key',

    // feature flags
    'app.roadmap_enabled',
    'app.blog_enabled',
    'app.newsletter_enabled',

    // provider settings
    'app.oauth_login_providers.google',
    'app.oauth_login_providers.facebook',
    'app.oauth_login_providers.github',
    'app.oauth_login_providers.twitter',
    'app.oauth_login_providers.magic_link',

    // share this
    'app.share_this_property_id',
    'app.share_this_enabled',

    // payment providers
    'app.payment_provider',
    'app.products',

    // mail settings
    'mail.default',
    'mail.from.name',
    'mail.from.address',

    // Open Graphy
    'open-graphy.enabled',
    'open-graphy.template',
    'open-graphy.logo.enabled',
    'open-graphy.logo.location',
    'open-graphy.screenshot.enabled',
    'open-graphy.template_settings.strings.background',
    'open-graphy.template_settings.strings.stroke_color',
    'open-graphy.template_settings.strings.stroke_width',
    'open-graphy.template_settings.strings.text_color',
    'open-graphy.template_settings.stripes.start_color',
    'open-graphy.template_settings.stripes.end_color',
    'open-graphy.template_settings.stripes.text_color',
    'open-graphy.template_settings.sunny.start_color',
    'open-graphy.template_settings.sunny.end_color',
    'open-graphy.template_settings.sunny.text_color',
    'open-graphy.template_settings.verticals.start_color',
    'open-graphy.template_settings.verticals.mid_color',
    'open-graphy.template_settings.verticals.end_color',
    'open-graphy.template_settings.verticals.text_color',
    'open-graphy.template_settings.nodes.background',
    'open-graphy.template_settings.nodes.node_color',
    'open-graphy.template_settings.nodes.edge_color',
    'open-graphy.template_settings.nodes.text_color',
  ];
}
