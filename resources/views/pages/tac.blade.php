@extends('layouts.master')

@section('content')
<div class="py-12 text-gray-800 p-1">
    <div class="max-w-7xl mx-auto bg-white rounded-lg p-8">
        <span class="font-bold text-2xl">Terms and Conditions</span>
        <div class="mt-4 text-justify">
            <h3 class="font-bold text-theme-800 text-xl">Introduction</h3>
            <p class="mb-4">These terms and conditions (the "Terms") govern the use of the services provided by
                Southville 7 Credit
                Cooperative (the
                "Organization"). By using our services, you agree to be bound by these Terms. If you do not agree to
                these Terms, you
                may not use our services.</p>
            <h3 class="font-bold text-theme-800 text-xl">Membership</h3>
            <p class="mb-4">To become a member of the Organization, you must meet the eligibility criteria set forth in
                our bylaws.
                Membership is
                subject to approval by the Organization's Board of Directors.</p>
            <h3 class="font-bold text-theme-800 text-xl">Services</h3>
            <p class="mb-4">The Organization provides its members with various financial services, including loans,
                savings accounts,
                and other
                financial products. The terms and conditions of these services are set forth in separate agreements.</p>
            <h3 class="font-bold text-theme-800 text-xl">Privacy</h3>
            <p class="mb-4">The Organization respects the privacy of its members and is committed to protecting their
                personal
                information. Our
                privacy policy sets forth the types of information we collect and how we use it. <span
                    class="text-theme-300 text-sm hover:underline"><a href="{{ route('policy') }}">Learn
                        more</a></span>
            </p>
            <h3 class="font-bold text-theme-800 text-xl">Governing Law</h3>
            <p class="mb-4">These Terms and any disputes arising out of or related to these Terms shall be governed by
                the laws of
                the Philippines.</p>
            <h3 class="font-bold text-theme-800 text-xl">Entire Agreement</h3>
            <p class="mb-4">These Terms constitute the entire agreement between you and the Organization regarding the
                use of our
                services.</p>
            <h3 class="font-bold text-theme-800 text-xl">Changes to Terms</h3>
            <p class="mb-4">The Organization reserves the right to make changes to these Terms at any time. We will
                provide notice of
                any changes to
                these Terms on our website.</p>
        </div>
    </div>
</div>
@endsection