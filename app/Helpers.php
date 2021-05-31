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

if ( ! function_exists('getProfilePicture'))
{
    function getProfilePicture()
    {
        $findMedia = auth()->user()->media;

        if (isset($findMedia[0])) {
            return $findMedia[0]->getFullUrl();
        }
        else {
            return asset('assets/img/user.png');
        }
    }
}
