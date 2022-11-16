<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'accepted' => ':attribute को स्वीकार किया जाना चाहिए।',
    'accepted_if' => 'द :attribute तभी स्वीकार किया जाना चाहिए जब :other is :value।',
    'active_url' => ':attribute एक मान्य URL नहीं है।',
    'after' => 'द :attribute :date के बाद की तारीख होनी चाहिए।',
    'after_or_equal' => ':attribute :date के बाद या उसके बराबर की तारीख होनी चाहिए।',
    'alpha' => 'द :attribute में केवल अक्षर होने चाहिए।',
    'alpha_dash' => ':attribute में केवल अक्षर, संख्याएं, डैश और अंडरस्कोर होने चाहिए।',
    'alpha_num' => 'इस :attribute में केवल अक्षर और अंक होने चाहिए।',
    'array' => ':attribute एक सरणी होनी चाहिए।',
    'before' => 'The :attribute :date पहले की तारीख होनी चाहिए।',
    'before_or_equal' => ':attribute :date से पहले या उसके बराबर की तारीख होनी चाहिए।',
    'between' => [
        'array' => ':attribute :min और :max आइटम के बीच होनी चाहिए।',
        'file' => ':attribute :min और :max किलोबाइट के बीच होनी चाहिए।',
        'numeric' => 'द :attribute :min और :max के बीच होना चाहिए।',
        'string' => 'द :attribute :min और :max कैरेक्टर्स के बीच होना चाहिए।',
    ],
    'boolean' => ':attribute फ़ील्ड सही या गलत होना चाहिए।',
    'confirmed' => 'द :attribute कन्फर्मेशन मेल नहीं खाता।',
    'current_password' => 'पासवर्ड गलत है।',
    'date' => 'द :attribute वैध तारीख नहीं है।',
    'date_equals' => 'द :attribute :date के बराबर एक तारीख होनी चाहिए।',
    'date_format' => 'द :attribute :format के फॉर्मेट से मेल नहीं खाता।',
    'declined' => 'द :attribute को अस्वीकार किया जाना चाहिए।',
    'declined_if' => ': जब :other is :value हो तो :attribute को अस्वीकार कर दिया जाना चाहिए।',
    'different' => 'द :attribute और :other अलग-अलग होने चाहिए।',
    'digits' => 'The :attribute :digits के अंक होने चाहिए।',
    'digits_between' => ':attribute :min और :max अंकों के बीच होनी चाहिए।',
    'dimensions' => 'द :attribute का इमेज डाइमेंशन अमान्य है।',
    'distinct' => ':attribute फ़ील्ड में एक डुप्लिकेट :values है।',
    'doesnt_start_with' => ':attribute निम्न में से किसी एक के साथ शुरू नहीं हो सकती है: :values',
    'email' => 'द:attribute एक वैध ईमेल पता होना चाहिए।',
    'ends_with' => ':attribute निम्न में से किसी एक के साथ समाप्त होनी चाहिए: :values।',
    'enum' => 'चयनित :attribute अमान्य है।',
    'exists' => 'चयनित :attribute अमान्य है।',
    'file' => 'द :attribute एक फाइल होना चाहिए।',
    'filled' => 'द :attribute फील्ड में एक मान होना चाहिए।',
    'gt' => [
        'array' => 'द :attribute में :value आइटम्स से अधिक होना चाहिए।',
        'file' => 'द :attribute :value किलोबाइट्स से बड़ा होना चाहिए।',
        'numeric' => 'द :attribute :value से बड़ा होना चाहिए।',
        'string' => 'द :attribute :value कैरेक्टर्स से बड़ा होना चाहिए।',
    ],
    'gte' => [
        'array' => 'द :attribute में :value आइटम्स या अधिक होना चाहिए।',
        'file' => 'द :attribute :value किलोबाइट्स से बड़ा या उसके बराबर होना चाहिए।',
        'numeric' => ':attribute :value से अधिक या उसके बराबर होनी चाहिए।',
        'string' => 'द :attribute :value कैरेक्टर से बड़ा या उसके बराबर होना चाहिए।',
    ],
    'image' => ':attribute एक छवि होनी चाहिए।',
    'in' => 'चयनित :attribute अमान्य है।',
    'in_array' => 'द :attribute फील्ड :other में मौजूद नहीं है।',
    'integer' => ':attribute एक पूर्णांक होना चाहिए।',
    'ip' => 'द :attribute एक वैध IP पता होना चाहिए।',
    'ipv4' => ':attribute एक मान्य IPv4 पता होना चाहिए।',
    'ipv6' => ':attribute एक मान्य IPv6 पता होना चाहिए।',
    'json' => 'द :attribute एक मान्य JSON स्ट्रिंग होनी चाहिए।',
    'lt' => [
        'array' => 'द :attribute में :value आइटम्स से कम होना चाहिए।',
        'file' => ':attribute :value किलोबाइट से कम होनी चाहिए।',
        'numeric' => 'द :attribute :value से कम होनी चाहिए।',
        'string' => 'द :attribute :value कैरेक्टर्स से कम होना चाहिए।',
    ],
    'lte' => [
        'array' => 'द :attribute में :value आइटम्स से अधिक नहीं होना चाहिए।',
        'file' => ':attribute :value किलोबाइट से कम या उसके बराबर होनी चाहिए।',
        'numeric' => 'द :attribute :value से कम या उसके बराबर होनी चाहिए।',
        'string' => 'द :attribute :value कैरेक्टर से कम या उसके बराबर होना चाहिए।',
    ],
    'mac_address' => ':attribute एक वैध MAC पता होना चाहिए।',
    'max' => [
        'array' => ':attribute में :max आइटम से अधिक नहीं होना चाहिए।',
        'file' => ':attribute :max किलोबाइट से अधिक नहीं होनी चाहिए।',
        'numeric' => ':attribute :max से अधिक नहीं होनी चाहिए।',
        'string' => ':attribute :max वर्णों से अधिक नहीं होनी चाहिए।',
    ],
    'mimes' => 'द :attribute एक प्रकार की फाइल होनी चाहिए: :values।',
    'mimetypes' => 'द :attribute एक प्रकार की फाइल होनी चाहिए: :values।',
    'min' => [
        'array' => 'द :attribute में कम से कम :min आइटम्स होने चाहिए।',
        'file' => 'द :attribute कम से कम :min किलोबाइट्स होना चाहिए।',
        'numeric' => ':attribute कम से कम :min होनी चाहिए।',
        'string' => 'द :attribute कम से कम :min कैरेक्टर का होना चाहिए।',
    ],
    'multiple_of' => 'द :attribute :value का गुणज होना चाहिए।',
    'not_in' => 'चयनित :attribute अमान्य है।',
    'not_regex' => ':attribute प्रारूप अमान्य है।',
    'numeric' => ':attribute एक संख्या होनी चाहिए।',
    'password' => [
        'letters' => ':attribute में कम से कम एक अक्षर होना चाहिए।',
        'mixed' => ':attribute में कम से कम एक अपरकेस और एक लोअरकेस अक्षर होना चाहिए।',
        'numbers' => 'The :attribute में कम से कम एक नंबर होना चाहिए।',
        'symbols' => 'द :attribute में कम से कम एक सिंबल होना चाहिए।',
        'uncompromised' => 'दिया गया :attribute डेटा लीक में प्रकट हुई है। कृपया कोई भिन्न :attribute चुनें।',
    ],
    'present' => 'द :attribute क्षेत्र अवश्य मौजूद होना चाहिए।',
    'prohibited' => 'द :attribute फील्ड निषिद्ध है।',
    'prohibited_if' => ':attribute फ़ील्ड निषिद्ध है जब :other में :value।',
    'prohibited_unless' => ':attribute क्षेत्र तब तक निषिद्ध है जब तक :other :value में न हो।',
    'prohibits' => 'द :attribute फील्ड :other को उपस्थित होने से रोकता है।',
    'regex' => ':attribute प्रारूप अमान्य है।',
    'required' => 'द :attribute फ़ील्ड की आवश्यकता है।',
    'required_array_keys' => ':attribute फ़ील्ड में निम्न के लिए प्रविष्टियाँ होनी चाहिए: :values।',
    'required_if' => 'द :attribute फील्ड की जरूरत तब पड़ती है जब :other में :value।',
    'required_unless' => 'द :attribute फील्ड तब तक जरूरी है जब तक :other :values ​​में न हो।',
    'required_with' => 'द :attribute फील्ड की जरूरत तब पड़ती है जब :values ​​मौजूद हो।',
    'required_with_all' => 'जब :values ​​मौजूद हों तो :attribute फ़ील्ड आवश्यक है।',
    'required_without' => 'जब :values ​​मौजूद नहीं है, तब :attribute फ़ील्ड की आवश्यकता होती है।',
    'required_without_all' => 'जब कोई भी :values ​​मौजूद न हो तो :attribute फ़ील्ड की आवश्यकता होती है।',
    'same' => 'The :attribute और :other का मिलान होना चाहिए।',
    'size' => [
        'array' => 'द :attribute में :size आइटम्स होने चाहिए।',
        'file' => 'द :attribute :size किलोबाइट्स होना चाहिए।',
        'numeric' => 'द :attribute :size होना चाहिए।',
        'string' => 'द :attribute :size कैरेक्टर होना चाहिए।',
    ],
    'starts_with' => ':attribute निम्न में से किसी एक से शुरू होनी चाहिए: :values।',
    'string' => 'द :attribute एक स्ट्रिंग होना चाहिए।',
    'timezone' => 'द :attribute एक मान्य टाइमज़ोन होना चाहिए।',
    'unique' => 'The :attribute पहले ही लिया जा चुका है।',
    'uploaded' => 'The :attribute अपलोड करने में विफल रहा।',
    'url' => ':attribute एक मान्य URL होना चाहिए।',
    'uuid' => 'द :attribute एक मान्य UUID होना चाहिए।',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
