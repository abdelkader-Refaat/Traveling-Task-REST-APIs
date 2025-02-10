<?php

use Carbon\Carbon;

function convert2english($string)
{
    $newNumbers = range(0, 9);
    $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $string = str_replace($arabic, $newNumbers, $string);
    return $string;
}

function fixPhone($string = null)
{
    if (!$string) {
        return null;
    }

    $result = convert2english($string);
    $result = ltrim($result, '00');
    $result = ltrim($result, '0');
    $result = ltrim($result, '+');
    return $result;
}

function getYoutubeVideoId($youtubeUrl)
{
    preg_match(
        "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/",
        $youtubeUrl,
        $videoId
    );
    return $youtubeVideoId = isset($videoId[1]) ? $videoId[1] : "";
}

function lang()
{
    return App()->getLocale();
}

function generateRandomCode()
{
    return '1234';
    return rand(1000, 9999);
}

if (!function_exists('languages')) {
    function languages()
    {
        return ['ar', 'en'];
    }
}

if (!function_exists('defaultLang')) {
    function defaultLang()
    {
        return 'ar';
    }
}

if (!function_exists('log_error')) {
    function log_error($exception = null)
    {
        delete_log_file();
        $trace = debug_backtrace();
        $class = $trace[1]['class'];
        $function = $trace[1]['function'];
        info('there is error at class ===> ' . $class . ' , function ===> ' . $function . ' //// the exception ===========> ', [
            'message' => $exception->getMessage(),
            'file' => [
                'file' => $exception?->getFile(),
                'line' => $exception?->getLine(),
            ],
        ]);
        return response()->json([
            'key' => 'fail',
            'msg' => __('apis.server_error'),
        ]);
    }
}

if (!function_exists('delete_log_file')) {
    function delete_log_file($max_size = 10)
    {
        $logFilePath = storage_path('logs/laravel.log');

        if (file_exists($logFilePath)) {
            $fileSize = filesize($logFilePath);

            $base = log($fileSize, 1024);
            $size = round(pow(1024, $base - floor($base)), 2);

            if ($size > $max_size) {
                unlink($logFilePath);
            }
        }
    }
}
function timeAgo($timestamp)
{
    $time = Carbon::parse($timestamp);

    $diffInSeconds = $time->diffInSeconds();
    $diffInMinutes = $time->diffInMinutes();
    $diffInHours = $time->diffInHours();
    $diffInDays = $time->diffInDays();
    $diffInWeeks = $time->diffInWeeks();
    $diffInMonths = $time->diffInMonths();
    $diffInYears = $time->diffInYears();

    return match (true) {
        $diffInSeconds < 60 => formatArabicTime((int) $diffInSeconds, 'second'),
        $diffInMinutes < 60 => formatArabicTime((int) $diffInMinutes, 'minute'),
        $diffInHours < 24 => formatArabicTime((int) $diffInHours, 'hour'),
        $diffInDays < 7 => formatArabicTime((int) $diffInDays, 'day'),
        $diffInWeeks < 4 => formatArabicTime((int) $diffInWeeks, 'week'),
        $diffInMonths < 12 => formatArabicTime((int) $diffInMonths, 'month'),
        default => formatArabicTime((int) $diffInYears, 'year'),
    };
}

/**
 * Format time in Arabic based on the value and type.
 */
function formatArabicTime($value, $type)
{
    $unit = arabicUnit($value, $type);
    return $value == 2
        ? __('apis.time_ago.just_unit', ['unit' => $unit])
        : __('apis.time_ago.full', ['value' => $value, 'unit' => $unit]);
}

/**
 * Determine the correct Arabic unit based on value.
 */
function arabicUnit($value, $type)
{
    return match ($type) {
        'second' => match (true) {
                $value == 1 => 'ثانية',
                $value == 2 => 'ثانيتان',
                $value >= 3 && $value <= 10 => 'ثوانٍ',
                default => 'ثانية',
            },
        'minute' => match (true) {
                $value == 1 => 'دقيقة',
                $value == 2 => 'دقيقتان',
                $value >= 3 && $value <= 10 => 'دقائق',
                default => 'دقيقة',
            },
        'hour' => match (true) {
                $value == 1 => 'ساعة',
                $value == 2 => 'ساعتان',
                $value >= 3 && $value <= 10 => 'ساعات',
                default => 'ساعة',
            },
        'day' => match (true) {
                $value == 1 => 'يوم',
                $value == 2 => 'يومان',
                $value >= 3 && $value <= 10 => 'أيام',
                default => 'يوم',
            },
        'week' => match (true) {
                $value == 1 => 'أسبوع',
                $value == 2 => 'أسبوعان',
                $value >= 3 && $value <= 10 => 'أسابيع',
                default => 'أسبوع',
            },
        'month' => match (true) {
                $value == 1 => 'شهر',
                $value == 2 => 'شهران',
                $value >= 3 && $value <= 10 => 'أشهر',
                default => 'شهر',
            },
        'year' => match (true) {
                $value == 1 => 'سنة',
                $value == 2 => 'سنتان',
                $value >= 3 && $value <= 10 => 'سنوات',
                default => 'سنة',
            },
        default => '',
    };
}

