<?php

namespace App\Helpers;

class alertHelper
{
    public static function my_alert()
    {

        if (session('error')) {
            return '
            <div class="alert alert-danger alert-dismissible"><i class="icon fa fa-ban"></i> ' . session('error') . '
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div> ';
        }

        if (session('success')) {
            return '
            <div class="alert alert-success alert-dismissible"><i class="icon fa fa-check"></i> ' . session('success') . '
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div> ';
        }
        if (session('info')) {
            return '
            <div class="alert alert-info alert-dismissible"><i class="icon fa fa-info"></i> ' .
                session('info') . '
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            ';
        }
        if (session('warning')) {
            return '
            <div  class="alert alert-warning alert-dismissible"><i class="icon fa fa-warning"></i> ' .
                session('warning') . '
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
            ';
        }
    }
}
