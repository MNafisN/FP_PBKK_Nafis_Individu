{% extends 'template.volt' %}
{% block head %}
{{ assets.outputCss('header') }}
{% endblock %}

{% block body %}
{{ content() }}
{% endblock %}

{% block script %}
{{  assets.outputJs('footer') }}
{% endblock %}