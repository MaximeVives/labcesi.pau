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

    'accepted' => 'L :attribute doit être accepté.',
    'active_url' => 'L :attribute n est pas une URL valide.',
    'after' => 'L :attribute doit être une date postérieure à :date.',
    'after_or_equal' => 'L :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'L :attribute ne peut contenir que des lettres.',
    'alpha_dash' => 'L :attribute ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'L :attribute ne peut contenir que des lettres et des chiffres.',
    'array' => 'L :attribute doit être un tableau.',
    'before' => 'L :attribute doit être une date antérieure à la date :date.',
    'before_or_equal' => 'L :attribute doit être une date antérieure ou égale à :date',
    'entre'  => [
        'numeric' => 'L :attribute doit être compris entre :min et :max.',
        'file' => 'L :attribute doit être compris entre :min et :max kilobytes.',
        'string' => 'L :attribute doit être compris entre les caractères :min et :max.',
        'array' => 'L :attribute doit être compris entre les éléments :min et :max.',
    ],

    'boolean' => 'Le champ d :attribute doit être vrai ou faux.',
    'confirmed' => 'La confirmation de l :attribute ne correspond pas.',
    'date' => 'L :attribute n est pas une date valide.',
    'date_equals' => 'L :attribute doit être une date égale à :date.',
    'date_format' => 'L :attribute ne correspond pas au format :format.',
    'different' => 'L :attribute et :other doivent être différents.',
    'digits' => 'L :attribute doit être :digits un chiffre.',
    'digits_between' => 'L :attribute doit être compris entre les chiffres :min et :max.',
    'dimensions' => 'L :attribute a des dimensions d image non valides.',
    'distinct' => 'Le champ de l :attribute a une valeur en double.',
    'email' => 'L :attribute doit être une adresse email valide.',
    'ends_with' => 'L :attribute doit se terminer par l une des mentions suivantes : value.',
    'exists' => ' selected :sélectionné n est pas valide.',
    'file' => 'L :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute attribut doit avoir une valeur.',
    'gt' => [
        'numeric' => 'L :attribute doit être supérieur à la :value.',
        'file' => 'L :attribute doit être supérieur à la :value kilobytes.',
        'string' => 'L :attribute doit être supérieur à :value caractères.',
        'array' => 'L :attribute doit être supérieur à :value éléments.',
    ],
    'gte' => [
        'numeric' => 'L :attribute mdoit être supérieur ou égal à :value.',
        'file' => 'L :attribute doit être supérieur ou égal à la :value en kilobytes.',
        'string' => 'L :attribute doit être supérieur ou égal à la :value en caractères.',
        'array' => 'L :attribute doit avoir une valeur supérieure ou égale à la :value des éléments.',
    ],
    'image' => 'L :attribute doit être une image.',
    'in' => 'L :attribute sélectionné n est pas valide.',
    'in_array' => 'Le champ :attribute n existe pas dans :other.',
    'integer' => 'L :attribute doit être un entier.',

    'ip' => 'L :attribute doit être une adresse IP valide.',
    'ipv4' => 'L :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'L :attribute doit être une adresse IPv6 valide.',
    'json' => 'L :attribute doit être une chaîne JSON valide.',
    'lt' => [
        'numeric' => 'L :attribute doit être inférieur à :valeur.',
        'file' => 'L :attribute doit être inférieur à :value kilobytes.',
        'string' => 'L :attribute doit être inférieur à :value en caractères.',
        'array' => 'L :attribute doit avoir une valeur inférieure à :value.',
    ],
    'lte' => [
        'numeric' => 'L :attribute doit être inférieur ou égal à :valeur.',
        'file' => 'L :attribute doit être inférieur ou égal à :value kilobytes.',
        'string' => 'L :attribute doit être inférieur ou égal à :value characters.',
        'array' => 'L :attribute ne doit pas avoir plus de éléments de :value .',
    ],
    'max' => [
        'numeric' => 'La valeur de :attribute ne peut être supérieure à :max.',
        'file' => 'Le fichier :attribute ne peut être plus gros que :max kilobytes.',
        'string' => 'Le texte de :attribute ne peut contenir plus de :max caractères.',
        'array' => 'L :attribute ne peut pas avoir plus de :max éléments.',


    ],
    'mimes' => 'Le champ :attribute doit être un fichier de type :values.',
    'mimetypes' => 'L :attribute doit être un fichier de type :values.',
    'min' => [
        'numeric' => 'L :attribute doit être au moins :min.',
        'file' => 'L :attribute doit être au moins égal à :min kilobytes.',
        'string' => 'L :attribute doit être au moins égal à :min caractères.',
        'array' => 'L :attribute doit avoir au moins :min d éléments.',
    ],
    "not_in" => "Le champ :attribute sélectionné n'est pas valide.",
    'not_regex' => 'le format de l :attribute n est pas valide.',
    'numeric' => 'L :attribute doit être un nombre.',
    'password' => 'Le mot de passe est incorrect.',


    'present' => 'le champ de l :attribute doit être présent.',
    'regex' => 'le format de l :attribute n est pas valide.',
    'required' => 'le champ d :attribute est obligatoire.',
    'required_if' => 'champ d :attribut est requis lorsque :other est :valeur',
    'required_unless' => 'le champ d :attribute est obligatoire sauf si :other est dans :values',
    'required_with' => 'champ d :attribute est requis lorsque :values est présent.',
    'required_with_all' => 'champ d :attribute est requis lorsque :values est présent.',
    'required_without' => 'champ d :attribute est requis lorsque :values est absent.',
    'required_without_all' => 'champ d :attribute est requis lorsqu aucune des :values n est présente .',
    'same' => 'L :attribute et :other doivent correspondre.',
    'size' => [
        'numeric' => 'L :attribute doit être :size.',
        'file' => 'L :attribute doit être :size kilobytes.',
        'string' => 'L :attribute doit être :size des caractères.',
        'array' => 'L :attribute doit contenir des éléments :size .',
    ],
    'starts_with' => 'L :attribute doit commencer par l un des éléments suivants: :values.',
    'string' => 'L :attribute doit être une chaîne de caractères.',
    'timezone' => 'L :attribute doit être une zone valide.',
    'unique' => 'L :attribute a déjà été pris.',
    'uploaded' => 'L :attribute n a pas été uploadé.',
    'url' => 'Le format de l :attribute n est pas valide.',
    'uuid' => 'L :attributedoit être un UUID valide.',
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
