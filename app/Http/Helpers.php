<?php

use App\Models\Changelog;
use App\Models\Member;
use App\Models\MemberRank;
use App\Models\Role;
use App\Models\Squad;
use App\Models\SystemVariable;
use App\Models\User;
use App\Models\UserColor;
use Illuminate\Http\Request;

if (!function_exists('socialTimestamp')) {
    /**
     * Check role against role hierarchy.
     *
     * @param      $timestamp
     *
     * @return string
     */
    function socialTimestamp($timestamp)
    {
        $datetime1 = new DateTime("now");
        $datetime2 = date_create($timestamp);
        $diff = date_diff($datetime1, $datetime2);

        $timemsg = '';
        if ($diff->y > 0) {
            $timemsg = $diff->y . ' year' . ($diff->y > 1 ? "s" : '');
        } else if ($diff->m > 0) {
            $timemsg = $diff->m . ' month' . ($diff->m > 1 ? "s" : '');
        } else if ($diff->d > 13) {
            $timemsg = floor($diff->d / 7) . ' weeks';
        } else if ($diff->d > 0) {
            $timemsg = $diff->d . ' day' . ($diff->d > 1 ? "s" : '');
        } else if ($diff->h > 0) {
            $timemsg = $diff->h . ' hour' . ($diff->h > 1 ? "s" : '');
        } else if ($diff->i > 0) {
            $timemsg = $diff->i . ' minute' . ($diff->i > 1 ? "s" : '');
        } else if ($diff->s > 0) {
            $timemsg = $diff->s . ' second' . ($diff->s > 1 ? "s" : '');
        }

        $timemsg = $timemsg . ' ago';
        return $timemsg;
    }
}

if (!function_exists('convertToTimeZone')) {
    /**
     * Convert Time to User's Timezone
     *
     * @param null $user
     *
     * @return string
     */
    function convertToTimeZone($time)
    {
        if (Auth::check()) {
            return $time->setTimezone(Auth::user()->timezone);
        } else {
            return $time;
        }
    }
}

if (!function_exists('percentClass')) {
    /**
     * Output bootstrap class based on percent integer
     *
     * @param null $percent
     *
     * @return string
     */
    function percentClass($percent)
    {
        if ($percent == 0) {
            return 'default';
        } else if ($percent < 25) {
            return 'danger';
        } else if ($percent >= 25 && $percent < 60) {
            return 'warning';
        } else {
            return 'success';
        }
    }
}

if (!function_exists('ordinalNumber')) {
    /**
     * Convert integers to their ordianl display IE: 1 to 1st.
     *
     * @param integer $number
     *
     * @return string
     */
    function ordinalNumber($number)
    {
        if ($number) {
            $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
            if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
                return $number . 'th';
            } else {
                return $number . $ends[$number % 10];
            }
        } else {
            return null;
        }
    }
}

if (!function_exists('systemVariables')) {
    /**
     * 
     *
     *
     * @param array $variables
     * @return array
     */
    function systemVariables(...$variables)
    {
        $values = [];

        foreach ($variables as $variable) {
            $finder = SystemVariable::where('name', $variable)->first();

            if (isset($finder->value)) {
                $values[] = $finder->value;
            } else {
                $values[] = null;
            }
        }

        return $values;
    }
}


if (!function_exists('updateSystemVariable')) {
    /**
     * 
     *
     *
     * @param array $variables
     * @return integer
     */
    function updateSystemVariable(...$variables)
    {
        foreach ($variables as $variable) {
            $update = SystemVariable::where('name', $variable['name'])->first();

            if ($update) {
                $update->value = $variable['value'];
                $update->save();
            } else {
                return false;
            }
        }

        return true;
    }
}

if (!function_exists('activeUserTimestamp')) {
    /**
     * Display social timestamp but starting at minutes.
     *
     * @param      $timestamp
     *
     * @return string
     */
    function activeUserTimestamp($timestamp)
    {
        $datetime1 = new DateTime("now");
        $datetime2 = date_create($timestamp);
        $diff = date_diff($datetime1, $datetime2);

        $timemsg = '';
        if ($diff->y > 0) {
            $timemsg = $diff->y . ' year' . ($diff->y > 1 ? "s" : '');
        } else if ($diff->m > 0) {
            $timemsg = $diff->m . ' month' . ($diff->m > 1 ? "s" : '');
        } else if ($diff->d > 13) {
            $timemsg = floor($diff->d / 7) . ' weeks';
        } else if ($diff->d > 0) {
            $timemsg = $diff->d . ' day' . ($diff->d > 1 ? "s" : '');
        } else if ($diff->h > 0) {
            $timemsg = $diff->h . ' hour' . ($diff->h > 1 ? "s" : '');
        } else if ($diff->i > 0) {
            $timemsg = $diff->i . ' minute' . ($diff->i > 1 ? "s" : '');
        } else if ($diff->s > 0) {
            $timemsg = '1 minute';
        } else {
            return 'Just Now';
        }

        $timemsg = $timemsg . ' ago';
        return $timemsg;
    }
}

if (!function_exists('lastActiveTimestamp')) {
    /**
     * Display timestamp with days and hours
     *
     * @param      $timestamp
     *
     * @return string
     */
    function lastActiveTimestamp($timestamp)
    {
        $datetime1 = new DateTime("now");
        $datetime2 = date_create($timestamp);
        $diff = date_diff($datetime1, $datetime2);

        $timemsg = '';
        if ($diff->y > 0) {
            $timemsg = $diff->y . ' year' . ($diff->y > 1 ? "s" : '') . " ";
        }if ($diff->m > 0) {
            $timemsg = $timemsg . $diff->m . ' month' . ($diff->m > 1 ? "s" : '') . " ";
        }if ($diff->d > 13) {
            $timemsg = floor($diff->d / 7) . ' weeks' . " ";
        }if ($diff->d > 0) {
            $timemsg = $timemsg . $diff->d . ' day' . ($diff->d > 1 ? "s" : '') . " ";
        }if ($diff->h > 0) {
            $timemsg = $timemsg . $diff->h . ' hour' . ($diff->h > 1 ? "s" : '') . " ";
        }

        $timemsg = $timemsg . ' ago';
        return $timemsg;
    }
}

if (!function_exists('isAdmin')) {
    /**
     * Return true/false if someone is an admin.
     *
     * @return bool
     */
    function isAdmin()
    {
        if (Auth::check()) {
            $user_role = Auth::user()->role->rank;
            if ($user_role == 99) {
                return false;
            } else if ($user_role > 8) {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }
}

if (!function_exists('encryptString')) {
    /**
     * Encrypt a string
     *
     * @param string $string
     *
     * @return bool
     */
    function encryptString($string)
    {
        $value = unpack('H*', encrypt($string))[1];

        return $value;
    }
}

if (!function_exists('decryptString')) {
    /**
     * Decrypt a string
     *
     * @param string $string
     *
     * @return bool
     */
    function decryptString($string)
    {
        $value = decrypt(pack("H*", $string));

        return $value;
    }
}
