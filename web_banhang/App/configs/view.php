<?php

class View
{
    function generate($content_view, $template_view, $data = null)
    {
        include 'App/views/' . $template_view;
    }
}


