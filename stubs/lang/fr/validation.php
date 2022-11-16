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

    'accepted' => 'L\':attribute doit être accepté.',
    'accepted_if' => 'L\' :attribut doit être accepté lorsque :other vaut :value.',
    'active_url' => 'L\' :attribut n\'est pas une URL valide.',
    'after' => 'Le :attribute doit être une date postérieure à :date.',
    'after_or_equal' => 'Le :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'Le :attribut ne doit contenir que des lettres.',
    'alpha_dash' => 'Le :attribut ne doit contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'Le :attribut ne doit contenir que des lettres et des chiffres.',
    'array' => 'Le :attribut doit être un tableau.',
    'before' => 'Le :attribut doit être une date avant :date.',
    'before_or_equal' => 'Le :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'array' => 'Le :attribute doit avoir entre :min et :max éléments.',
        'file' => 'Le :attribute doit être compris entre :min et :max kilo-octets.',
        'numeric' => 'Le :attribute doit être compris entre :min et :max.',
        'string' => 'Le :attribute doit être compris entre :min et :max caractères.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'La confirmation :attribute ne correspond pas.',
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => 'Le :attribut n\'est pas une date valide.',
    'date_equals' => 'Le :attribut doit être une date égale à :date.',
    'date_format' => 'Le :attribut ne correspond pas au format :format.',
    'declined' => 'Le :attribute doit être refusé.',
    'declined_if' => 'Le :attribute doit être refusé lorsque :other vaut :value.',
    'different' => 'Le :attribute et :other doivent être différents.',
    'digits' => 'Le :attribut doit être :digits chiffres.',
    'digits_between' => 'Le :attribut doit être compris entre :min et :max chiffres.',
    'dimensions' => 'L\' :attribut a des dimensions d\'image invalides.',
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'doesnt_start_with' => 'Le :attribute ne peut pas commencer par l\'un des éléments suivants : :values.',
    'email' => 'Le :attribute doit être une adresse e-mail valide.',
    'ends_with' => 'Le :attribute doit se terminer par l\'un des éléments suivants : :values.',
    'enum' => 'L\'attribut sélectionné n\'est pas valide.',
    'exists' => 'L\'attribut sélectionné n\'est pas valide.',
    'file' => 'Le :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'array' => 'Le :attribute doit avoir plus de :value éléments.',
        'file' => 'Le :attribute doit être supérieur à :value kilo-octets.',
        'numeric' => 'Le :attribut doit être supérieur à :valeur.',
        'string' => 'Le :attribut doit être supérieur à :value caractères.',
    ],
    'gte' => [
        'array' => 'Le :attribute doit avoir des éléments :value ou plus.',
        'file' => 'Le :attribute doit être supérieur ou égal à :value kilo-octets.',
        'numeric' => 'Le :attribut doit être supérieur ou égal à :value.',
        'string' => 'Le :attribut doit être supérieur ou égal à :value caractères.',
    ],
    'image' => 'Le :attribute doit être une image.',
    'in' => 'L\'attribut sélectionné n\'est pas valide.',
    'in_array' => 'Le champ :attribute n\'existe pas dans :other.',
    'integer' => 'Le :attribut doit être un entier.',
    'ip' => 'Le :attribute doit être une adresse IP valide.',
    'ipv4' => 'Le :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Le :attribute doit être une adresse IPv6 valide.',
    'json' => 'Le :attribute doit être une chaîne JSON valide.',
    'lt' => [
        'array' => 'Le :attribute doit avoir moins de :value éléments.',
        'file' => 'Le :attribute doit être inférieur à :value kilo-octets.',
        'numeric' => 'Le :attribut doit être inférieur à :value.',
        'string' => 'Le :attribute doit être inférieur à :value caractères.',
    ],
    'lte' => [
        'array' => 'Le :attribut ne doit pas avoir plus de :value éléments.',
        'file' => 'Le :attribute doit être inférieur ou égal à :value kilo-octets.',
        'numeric' => 'Le :attribut doit être inférieur ou égal à :value.',
        'string' => 'Le :attribut doit être inférieur ou égal à :value caractères.',
    ],
    'mac_address' => 'Le :attribute doit être une adresse MAC valide.',
    'max' => [
        'array' => 'Le :attribut ne doit pas avoir plus de :max éléments.',
        'file' => 'Le :attribute ne doit pas être supérieur à :max kilo-octets.',
        'numeric' => 'Le :attribute ne doit pas être supérieur à :max.',
        'string' => 'Le :attribut ne doit pas être supérieur à :max caractères.',
    ],
    'mimes' => 'Le :attribute doit être un fichier de type : :values.',
    'mimetypes' => 'Le :attribute doit être un fichier de type : :values.',
    'min' => [
        'array' => 'Le :attribute doit avoir au moins :min éléments.',
        'file' => 'Le :attribute doit faire au moins :min kilo-octets.',
        'numeric' => 'Le :attribut doit être au moins égal à :min.',
        'string' => 'Le :attribute doit contenir au moins :min caractères.',
    ],
    'multiple_of' => 'Le :attribut doit être un multiple de :value.',
    'not_in' => 'L\'attribut sélectionné n\'est pas valide.',
    'not_regex' => 'Le format :attribute est invalide.',
    'numeric' => 'Le :attribute doit être un nombre.',
    'password' => [
        'letters' => 'Le :attribute doit contenir au moins une lettre.',
        'mixed' => 'Le :attribute doit contenir au moins une lettre majuscule et une lettre minuscule.',
        'numbers' => 'Le :attribute doit contenir au moins un nombre.',
        'symbols' => 'Le :attribute doit contenir au moins un symbole.',
        'uncompromised' => 'L\'attribut :donné est apparu dans une fuite de données. Veuillez choisir un autre :attribut.',
    ],
    'present' => 'Le champ :attribute doit être présent.',
    'prohibited' => 'Le champ :attribute est interdit.',
    'prohibited_if' => 'Le champ :attribute est interdit lorsque :other vaut :value.',
    'prohibited_unless' => 'Le champ :attribute est interdit sauf si :other est dans :values.',
    'prohibits' => 'Le champ :attribute interdit la présence de :other.',
    'regex' => 'Le format :attribute n\'est pas valide.',
    'required' => 'Le champ :attribute est obligatoire.',
    'required_array_keys' => 'Le champ :attribute doit contenir des entrées pour : :values.',
    'required_if' => 'Le champ :attribute est obligatoire lorsque :other vaut :value.',
    'required_unless' => 'Le champ :attribute est obligatoire sauf si :other est dans :values.',
    'required_with' => 'Le champ :attribute est obligatoire lorsque :values ​​est présent.',
    'required_with_all' => 'Le champ :attribute est obligatoire lorsque :des valeurs sont présentes.',
    'required_without' => 'Le champ :attribute est requis lorsque :values ​​n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est requis lorsqu\'aucune des :values ​​n\'est présente.',
    'same' => 'Le :attribute et :other doivent correspondre.',
    'size' => [
        'array' => 'Le :attribut doit contenir des éléments :size.',
        'file' => 'Le :attribut doit être :size kilo-octets.',
        'numeric' => 'Le :attribut doit être :size.',
        'string' => 'Le :attribut doit être composé de :size caractères.',
    ],
    'starts_with' => 'Le :attribute doit commencer par l\'un des éléments suivants : :values.',
    'string' => 'Le :attribute doit être une chaîne.',
    'timezone' => 'L\' :attribut doit être un fuseau horaire valide.',
    'unique' => 'L\':attribut a déjà été pris.',
    'uploaded' => 'Le :attribut n\'a pas pu être téléchargé.',
    'url' => 'Le :attribute doit être une URL valide.',
    'uuid' => 'Le :attribute doit être un UUID valide.',

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
