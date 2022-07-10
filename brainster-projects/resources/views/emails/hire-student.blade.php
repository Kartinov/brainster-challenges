@component('mail::message')
    # Апликација за студент од нашата академија

    - Компанија {{ $companyData->company_name }}

    - Е-пошта: {{ $companyData->company_email }}

    - Телефонски број: {{ $companyData->company_phone }}
@endcomponent
