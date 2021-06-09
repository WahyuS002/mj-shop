<?php

use App\Constants;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

if (!function_exists('createAcronym')) {
    function createAcronym($words)
    {
        $acronym = '';
        $words = explode(' ', $words);
        foreach ($words as $word) {
            $first_letter = str_split($word);

            $acronym .= $first_letter[0];
        }

        return $acronym;
    }
}

if (!function_exists('getAdminName')) {
    function getAdminName()
    {
        $name = trim(auth()->user()->name);
        $names = explode(' ', $name);
        if (count($names) == 1)
            return $name;

        $firstName = $names[0];

        $lastName = '';
        for ($i = 1; $i < count($names); $i++) {
            $lastName .= $names[$i] . ' ';
        }
        $lastName = rtrim($lastName);
        $lastName = createAcronym($lastName);

        $name = $firstName . ' ' . $lastName;

        return $name;
    }
}

if (!function_exists('getUserProfilePicture')) {
    function getUserProfilePicture($default = '')
    {
        $user = auth()->user();

        return isset($user->media[0]) ? $user->media[0]->getFullUrl()
            : (($default === '') ? asset('assets/img/90x90.jpg') : asset($default));
    }
}

if (!function_exists('getSiteLogo')) {
    function getSiteLogo($showAsIcon = false)
    {
        $data = Setting::where('key', 'siteLogo')->first();

        if ($showAsIcon === false) {
            if (isset($data->media[0])) {
                return $data->media[0]->getFullUrl();
            } else {
                return asset('assets/img/90x90.jpg');
            }
        } else {
            return getSiteIcon();
        }
    }
}

if (!function_exists('getSiteIcon')) {
    function getSiteIcon()
    {
        $data = Setting::where('key', 'siteIcon')->first();

        if (isset($data->media[0])) {
            return $data->media[0]->getFullUrl();
        } else {
            return asset('assets/img/90x90.jpg');
        }
    }
}

if (!function_exists('getSetting')) {
    /**
     * Mendapatkan data pengaturan
     *
     * Mendapatkan data pengaturan berdasarkan
     * kunci yang diberikan.
     *
     * @param mixed $key    Kunci pengaturan
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return  String  Data pengaturan
     */
    function getSetting($key)
    {
        if (DB::table('settings')->where('key', $key)->exists()) {
            $setting = DB::table('settings')->select('value')
                ->where('key', $key)
                ->first();

            return $setting->value;
        }

        return "{KEY_NOT_DEFINED|$key}";
    }
}

if (!function_exists('getSiteName')) {
    /**
     * Mendapatkan nama situs
     *
     * Mendapatkan data nama situs dari
     * tabel `settings`
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return  String  Nama situs
     */
    function getSiteName()
    {
        return getSetting('siteName');
    }
}

if (!function_exists('updateSetting')) {
    /**
     * Memperbarui data pengaturan
     *
     * Memperbarui data pengaturan berdasarkan
     * kunci yang diberikan
     *
     * @param mixed $key        kunci pengaturan
     * @param string $newValue  data baru
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return void
     */
    function updateSetting($key, $newValue = '')
    {
        DB::table('settings')
            ->where('key', $key)
            ->update([
                'value' => $newValue
            ]);
    }
}

if (!function_exists('getController')) {
    /**
     * Mendapatkan nama controller
     *
     * Mendapatkan nama controller yang sedang diakses
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return String   nama controller
     */
    function getController()
    {
        $action = app('request')->route()->getAction();
        $route = class_basename($action['controller']);

        list($controller, $action) = explode('@', $route);

        return $controller;
    }
}

if (!function_exists('getAction')) {
    /**
     * Mendapatkan nama method
     *
     * Mendapatkan nama method yang sedang diakses
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return  String  nama method
     */
    function getAction()
    {
        $action = app('request')->route()->getAction();
        $route = class_basename($action['controller']);

        list($controller, $action) = explode('@', $route);

        return $action;
    }
}

if (!function_exists('isController')) {
    /**
     * Memeriksa controller
     *
     * Memeriksa apakah controller yang sedang diakses adalah
     * controller `$controller`
     *
     * @param mixed $controller
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return Bool hasil pemeriksaan
     */
    function isController($controller)
    {
        return ($controller === getController());
    }
}

if (!function_exists('isAction')) {
    /**
     * Memeriksa method
     *
     * Memeriksa apakah method yang sedang diakses adalah
     * method `$action`
     *
     * @param mixed $action
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return  Bool hasil pemeriksaan
     */
    function isAction($action)
    {
        return ($action === getAction());
    }
}

if (!function_exists('__active')) {
    /**
     * Membuat class `.active`
     *
     * Membuat class `.active` jika controller dan method
     * yang sedang diakses sesuai dengan
     * kondisi yang diberikan
     *
     * @param string $controller
     * @param string $action
     * @param string $param
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return String   html class .active
     */
    function __active($controller = '', $action = '', $param = '')
    {
        $phpSelf = $_SERVER['PHP_SELF'];

        if ($controller === '' && $action === '') {
            return ' active';
        } else if ($param !== '') {
            if (isController($controller) && isAction($action)) {
                if (strpos($phpSelf, $param) !== FALSE) {
                    return ' active';
                }
            }
        } else if (is_array($controller) && count($controller)) {
            foreach ($controller as $c) {
                if (isController($c)) {
                    return ' active';
                    break;
                }
            }
        } else if (is_array($action) && count($action) > 0) {
            foreach ($action as $method) {
                if (isController($controller) && isAction($method)) {
                    return ' active';
                    break;
                }
            }
        } else if (isController($controller) && isAction($action)) {
            return ' active';
        } else if ($controller !== '' && $action === '') {
            return isController($controller) ? ' active' : '';
        }
    }
}

if (!function_exists('__displayAria')) {
    /**
     * Menentukan display aria
     *
     * Membuat desisi display aria
     * pada navigasi yang aktif
     * di sidebar.
     *
     * @param string $controller
     * @param string $action
     * @param string $param
     *
     * @since   1.0.0
     * @author  mulyosyahidin95
     *
     * @return String   html class .active
     */
    function __displayAria($controller = '', $action = '', $param = '')
    {
        $phpSelf = $_SERVER['PHP_SELF'];

        if ($controller === '' && $action === '') {
            return 'true';
        } else if ($param !== '') {
            if (isController($controller) && isAction($action)) {
                if (strpos($phpSelf, $param) !== FALSE) {
                    return true;
                }
            }
        } else if (is_array($controller) && count($controller)) {
            foreach ($controller as $c) {
                if (isController($c)) {
                    return 'true';
                    break;
                }
            }
        } else if (is_array($action) && count($action) > 0) {
            foreach ($action as $method) {
                if (isController($controller) && isAction($method)) {
                    return 'true';
                    break;
                }
            }
        } else if (isController($controller) && isAction($action)) {
            return 'true';
        } else if ($controller !== '' && $action === '') {
            return isController($controller) ? 'true' : '';
        }

        return 'false';
    }
}

if (!function_exists('displayPrice')) {
    function displayPrice($price = 0, $clearPrice = false)
    {
        if ($clearPrice == true) {
            $price = str_replace(',', '', $price);
        }
        return number_format($price, 2, ',', '.');
    }
}

if (!function_exists('in_array_r')) {
    function in_array_r($elem, $array, $field = '')
    {
        $top = sizeof($array) - 1;
        $bottom = 0;
        while ($bottom <= $top) {
            if ($array[$bottom][$field] == $elem)
                return true;
            else
            if (is_array($array[$bottom][$field]))
                if (in_array_r($elem, ($array[$bottom][$field])))
                    return true;

            $bottom++;
        }
        return false;
    }
}

if (!function_exists('splitOptions')) {
    function splitOptions($options = '')
    {
        $split = explode('|', $options);
        if (is_array($split) && count($split) > 0) {
            return $split;
        }

        return [];
    }
}

if (!function_exists('generateOrderNumber')) {
    function generateOrderNumber()
    {
        $time = time();
        //3 RANDOM STRING_USER ID_3 LAST TIME

        $str = strtoupper(Str::random(4));
        $time = substr($time, -3);
        $userId = auth()->user()->id;

        return $str . $time . $userId;
    }
}

if (!function_exists('clearPrice')) {
    function clearPrice($price)
    {
        return str_replace(',', '', $price);
    }
}

if (!function_exists('getConstants')) {
    function getConstants()
    {
        return new Constants;
    }
}
