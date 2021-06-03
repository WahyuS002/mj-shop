<?php
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
            :  (($default === '') ? asset('assets/img/90x90.jpg') : asset($default));
    }
}
