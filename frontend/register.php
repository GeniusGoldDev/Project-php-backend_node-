
	<!--begin::Head-->
	<head>
		<title>Metronic - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Tailwind CSS & Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="tailwind, tailwindcss, metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes" />
		<meta property="og:site_name" content="Metronic by Keenthemes" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts(mandatory for all pages)-->
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
            <div class="d-flex flex-column flex-root" id="kt_app_root">
                <!--begin::Authentication - Multi-steps-->
                <div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column stepper-multistep" id="kt_create_account_stepper">
                    <!--begin::Aside-->
                    <div class="d-flex flex-column flex-lg-row-auto w-lg-350px w-xl-500px">
                        <div class="d-flex flex-column position-lg-fixed top-0 bottom-0 w-lg-350px w-xl-500px scroll-y bgi-size-cover bgi-position-center" style="background-image: url(assets/media/misc/auth-bg.png)">
                            <!--begin::Header-->
                            <div class="d-flex flex-center py-10 py-lg-20 mt-lg-20">
                                <!--begin::Logo-->
                                <a href="index.html">
                                    <img alt="Logo" src="assets/media/logos/custom-1.png" class="h-70px" />
                                </a>
                                <!--end::Logo-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="d-flex flex-row-fluid justify-content-center p-10">
                                <!--begin::Nav-->
                                <div class="stepper-nav">
                                    <!--begin::Step 1-->
                                    <div class="stepper-item current" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon rounded-3">
                                                <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                                <span class="stepper-number">1</span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title fs-2">Account Type</h3>
                                                <div class="stepper-desc fw-normal">Select your account type</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 1-->
                                    <!--begin::Step 2-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon rounded-3">
                                                <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                                <span class="stepper-number">2</span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title fs-2">Account Info</h3>
                                                <div class="stepper-desc fw-normal">Setup your account settings</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 2-->
                                    <!--begin::Step 3-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon">
                                                <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                                <span class="stepper-number">3</span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title fs-2">Business Details</h3>
                                                <div class="stepper-desc fw-normal">Setup your business details</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 3-->
                                    <!--begin::Step 4-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon">
                                                <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                                <span class="stepper-number">4</span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">Billing Details</h3>
                                                <div class="stepper-desc fw-normal">Provide your payment info</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Line-->
                                        <div class="stepper-line h-40px"></div>
                                        <!--end::Line-->
                                    </div>
                                    <!--end::Step 4-->
                                    <!--begin::Step 5-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <!--begin::Wrapper-->
                                        <div class="stepper-wrapper">
                                            <!--begin::Icon-->
                                            <div class="stepper-icon">
                                                <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                                <span class="stepper-number">5</span>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Label-->
                                            <div class="stepper-label">
                                                <h3 class="stepper-title">Completed</h3>
                                                <div class="stepper-desc fw-normal">Your account is created</div>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Step 5-->
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="d-flex flex-center flex-wrap px-5 py-10">
                                <!--begin::Links-->
                                <div class="d-flex fw-normal">
                                    <a href="https://keenthemes.com" class="text-success px-5" target="_blank">Terms</a>
                                    <a href="https://devs.keenthemes.com" class="text-success px-5" target="_blank">Plans</a>
                                    <a href="https://1.envato.market/EA4JP" class="text-success px-5" target="_blank">Contact Us</a>
                                </div>
                                <!--end::Links-->
                            </div>
                            <!--end::Footer-->
                        </div>
                    </div>
                    <!--begin::Aside-->
                    <!--begin::Body-->
                    <div class="d-flex flex-column flex-lg-row-fluid py-10">
                        <!--begin::Content-->
                        <div class="d-flex flex-center flex-column flex-column-fluid">
                            <!--begin::Wrapper-->
                            <div class="w-lg-650px w-xl-700px p-10 p-lg-15 mx-auto">
                                <!--begin::Form-->
                                <form class="my-auto pb-5" novalidate="novalidate" id="kt_create_account_form">
                                    <!--begin::Step 1-->
                                    <div class="current" data-kt-stepper-element="content">
                                        <!--begin::Wrapper-->
                                        <div class="w-100">
                                            <!--begin::Heading-->
                                            <div class="pb-10 pb-lg-15">
                                                <!--begin::Title-->
                                                <h2 class="fw-bold d-flex align-items-center text-gray-900">Choose Account Type 
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Billing is issued based on your selected account typ">
                                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span></h2>
                                                <!--end::Title-->
                                                <!--begin::Notice-->
                                                <div class="text-muted fw-semibold fs-6">If you need more info, please check out 
                                                <a href="#" class="link-primary fw-bold">Help Page</a>.</div>
                                                <!--end::Notice-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Input group-->
                                            <div class="fv-row">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-6">
                                                        <!--begin::Option-->
                                                        <input type="radio" class="btn-check" name="account_type" value="1" checked="checked" id="kt_create_account_form_account_type_personal" />
                                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
                                                            <i class="ki-duotone ki-badge fs-3x me-5">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                                <span class="path4"></span>
                                                                <span class="path5"></span>
                                                            </i>
                                                            <!--begin::Info-->
                                                            <span class="d-block fw-semibold text-start">
                                                                <span class="text-gray-900 fw-bold d-block fs-4 mb-2">Personal Account</span>
                                                                <span class="text-muted fw-semibold fs-6">If you need more info, please check it out</span>
                                                            </span>
                                                            <!--end::Info-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-6">
                                                        <!--begin::Option-->
                                                        <input type="radio" class="btn-check" name="account_type" value="2" id="kt_create_account_form_account_type_corporate" />
                                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center" for="kt_create_account_form_account_type_corporate">
                                                            <i class="ki-duotone ki-briefcase fs-3x me-5">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            <!--begin::Info-->
                                                            <span class="d-block fw-semibold text-start">
                                                                <span class="text-gray-900 fw-bold d-block fs-4 mb-2">Corporate Account</span>
                                                                <span class="text-muted fw-semibold fs-6">Create corporate account to mane users</span>
                                                            </span>
                                                            <!--end::Info-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Step 1-->
                                    <!--begin::Step 2-->
                                    <div class="" data-kt-stepper-element="content">
                                        <!--begin::Wrapper-->
                                        <div class="w-100">
                                            <!--begin::Heading-->
                                            <div class="pb-10 pb-lg-15">
                                                <!--begin::Title-->
                                                <h2 class="fw-bold text-gray-900">Account Info</h2>
                                                <!--end::Title-->
                                                <!--begin::Notice-->
                                                <div class="text-muted fw-semibold fs-6">If you need more info, please check out 
                                                <a href="#" class="link-primary fw-bold">Help Page</a>.</div>
                                                <!--end::Notice-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center form-label mb-3">Specify Team Size 
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Provide your team size to help us setup your billing">
                                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span></label>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row mb-2" data-kt-buttons="true">
                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                            <input type="radio" class="btn-check" name="account_team_size" value="1-1" />
                                                            <span class="fw-bold fs-3">1-1</span>
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4 active">
                                                            <input type="radio" class="btn-check" name="account_team_size" checked="checked" value="2-10" />
                                                            <span class="fw-bold fs-3">2-10</span>
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                            <input type="radio" class="btn-check" name="account_team_size" value="10-50" />
                                                            <span class="fw-bold fs-3">10-50</span>
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary w-100 p-4">
                                                            <input type="radio" class="btn-check" name="account_team_size" value="50+" />
                                                            <span class="fw-bold fs-3">50+</span>
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Hint-->
                                                <div class="form-text">Customers will see this shortened version of your statement descriptor</div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Team Account Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input id="account_name" type="text" class="form-control form-control-lg form-control-solid" name="account_name" placeholder="" value="" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Password</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input id="password" type="password" class="form-control form-control-lg form-control-solid" name="password" placeholder="" value="" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-0 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center form-label mb-5">Select Account Plan 
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Monthly billing will be based on your account plan">
                                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span></label>
                                                <!--end::Label-->
                                                <!--begin::Options-->
                                                <div class="mb-0">
                                                    <!--begin:Option-->
                                                    <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                        <!--begin:Label-->
                                                        <span class="d-flex align-items-center me-2">
                                                            <!--begin::Icon-->
                                                            <span class="symbol symbol-50px me-6">
                                                                <span class="symbol-label">
                                                                    <i class="ki-duotone ki-bank fs-1 text-gray-600">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </span>
                                                            </span>
                                                            <!--end::Icon-->
                                                            <!--begin::Description-->
                                                            <span class="d-flex flex-column">
                                                                <span class="fw-bold text-gray-800 text-hover-primary fs-5">Company Account</span>
                                                                <span class="fs-6 fw-semibold text-muted">Use images to enhance your post flow</span>
                                                            </span>
                                                            <!--end:Description-->
                                                        </span>
                                                        <!--end:Label-->
                                                        <!--begin:Input-->
                                                        <span class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="radio" name="account_plan" value="1" />
                                                        </span>
                                                        <!--end:Input-->
                                                    </label>
                                                    <!--end::Option-->
                                                    <!--begin:Option-->
                                                    <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                        <!--begin:Label-->
                                                        <span class="d-flex align-items-center me-2">
                                                            <!--begin::Icon-->
                                                            <span class="symbol symbol-50px me-6">
                                                                <span class="symbol-label">
                                                                    <i class="ki-duotone ki-chart fs-1 text-gray-600">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </span>
                                                            </span>
                                                            <!--end::Icon-->
                                                            <!--begin::Description-->
                                                            <span class="d-flex flex-column">
                                                                <span class="fw-bold text-gray-800 text-hover-primary fs-5">Developer Account</span>
                                                                <span class="fs-6 fw-semibold text-muted">Use images to your post time</span>
                                                            </span>
                                                            <!--end:Description-->
                                                        </span>
                                                        <!--end:Label-->
                                                        <!--begin:Input-->
                                                        <span class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="radio" checked="checked" name="account_plan" value="2" />
                                                        </span>
                                                        <!--end:Input-->
                                                    </label>
                                                    <!--end::Option-->
                                                    <!--begin:Option-->
                                                    <label class="d-flex flex-stack mb-0 cursor-pointer">
                                                        <!--begin:Label-->
                                                        <span class="d-flex align-items-center me-2">
                                                            <!--begin::Icon-->
                                                            <span class="symbol symbol-50px me-6">
                                                                <span class="symbol-label">
                                                                    <i class="ki-duotone ki-chart-pie-4 fs-1 text-gray-600">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </span>
                                                            <!--end::Icon-->
                                                            <!--begin::Description-->
                                                            <span class="d-flex flex-column">
                                                                <span class="fw-bold text-gray-800 text-hover-primary fs-5">Testing Account</span>
                                                                <span class="fs-6 fw-semibold text-muted">Use images to enhance time travel rivers</span>
                                                            </span>
                                                            <!--end:Description-->
                                                        </span>
                                                        <!--end:Label-->
                                                        <!--begin:Input-->
                                                        <span class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="radio" name="account_plan" value="3" />
                                                        </span>
                                                        <!--end:Input-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Options-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Step 2-->
                                    <!--begin::Step 3-->
                                    <div class="" data-kt-stepper-element="content">
                                        <!--begin::Wrapper-->
                                        <div class="w-100">
                                            <!--begin::Heading-->
                                            <div class="pb-10 pb-lg-12">
                                                <!--begin::Title-->
                                                <h2 class="fw-bold text-gray-900">Business Details</h2>
                                                <!--end::Title-->
                                                <!--begin::Notice-->
                                                <div class="text-muted fw-semibold fs-6">If you need more info, please check out 
                                                <a href="#" class="link-primary fw-bold">Help Page</a>.</div>
                                                <!--end::Notice-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label required">Business Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input id="business_name" name="business_name" class="form-control form-control-lg form-control-solid" value="Keenthemes Inc." />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center form-label">
                                                    <span class="required">Shortened Descriptor</span>
                                                    <span class="lh-1 ms-1" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="&lt;div class=&#039;p-4 rounded bg-light&#039;&gt; &lt;div class=&#039;d-flex flex-stack text-muted mb-4&#039;&gt; &lt;i class=&quot;ki-duotone ki-bank fs-3 me-3&quot;&gt;&lt;span class=&quot;path1&quot;&gt;&lt;/span&gt;&lt;span class=&quot;path2&quot;&gt;&lt;/span&gt;&lt;/i&gt; &lt;div class=&#039;fw-bold&#039;&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt; &lt;/div&gt; &lt;div class=&#039;d-flex flex-stack fw-semibold text-gray-600&#039;&gt; &lt;div&gt;Amount&lt;/div&gt; &lt;div&gt;Transaction&lt;/div&gt; &lt;/div&gt; &lt;div class=&#039;separator separator-dashed my-2&#039;&gt;&lt;/div&gt; &lt;div class=&#039;d-flex flex-stack text-gray-900 fw-bold mb-2&#039;&gt; &lt;div&gt;USD345.00&lt;/div&gt; &lt;div&gt;KEENTHEMES*&lt;/div&gt; &lt;/div&gt; &lt;div class=&#039;d-flex flex-stack text-muted mb-2&#039;&gt; &lt;div&gt;USD75.00&lt;/div&gt; &lt;div&gt;Hosting fee&lt;/div&gt; &lt;/div&gt; &lt;div class=&#039;d-flex flex-stack text-muted&#039;&gt; &lt;div&gt;USD3,950.00&lt;/div&gt; &lt;div&gt;Payrol&lt;/div&gt; &lt;/div&gt; &lt;/div&gt;">
                                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input id="business_descriptor" name="business_descriptor" class="form-control form-control-lg form-control-solid" value="KEENTHEMES" />
                                                <!--end::Input-->
                                                <!--begin::Hint-->
                                                <div class="form-text">Customers will see this shortened version of your statement descriptor</div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label required">Corporation Type</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select id="business_type" name="business_type" class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select..." data-allow-clear="true" data-hide-search="true">
                                                    <option></option>
                                                    <option value="1">S Corporation</option>
                                                    <option value="1">C Corporation</option>
                                                    <option value="2">Sole Proprietorship</option>
                                                    <option value="3">Non-profit</option>
                                                    <option value="4">Limited Liability</option>
                                                    <option value="5">General Partnership</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--end::Label-->
                                                <label class="form-label">Business Description</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea id="business_description" name="business_description" class="form-control form-control-lg form-control-solid" rows="3"></textarea>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-0">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label required">Contact Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input id="business_email" name="business_email" class="form-control form-control-lg form-control-solid" value="corp@support.com" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Step 3-->
                                    <!--begin::Step 4-->
                                    <div class="" data-kt-stepper-element="content">
                                        <!--begin::Wrapper-->
                                        <div class="w-100">
                                            <!--begin::Heading-->
                                            <div class="pb-10 pb-lg-15">
                                                <!--begin::Title-->
                                                <h2 class="fw-bold text-gray-900">Billing Details</h2>
                                                <!--end::Title-->
                                                <!--begin::Notice-->
                                                <div class="text-muted fw-semibold fs-6">If you need more info, please check out 
                                                <a href="#" class="text-primary fw-bold">Help Page</a>.</div>
                                                <!--end::Notice-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                    <span class="required">Name On Card</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip" title="Specify a card holder's name">
                                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <input id="card_name" type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe" />
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-semibold form-label mb-2">Card Number</label>
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <input id="card_number" type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111" />
                                                    <!--end::Input-->
                                                    <!--begin::Card logos-->
                                                    <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                        <img src="assets/media/svg/card-logos/visa.svg" alt="" class="h-25px" />
                                                        <img src="assets/media/svg/card-logos/mastercard.svg" alt="" class="h-25px" />
                                                        <img src="assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px" />
                                                    </div>
                                                    <!--end::Card logos-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row mb-10">
                                                <!--begin::Col-->
                                                <div class="col-md-8 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold form-label mb-2">Expiration Date</label>
                                                    <!--end::Label-->
                                                    <!--begin::Row-->
                                                    <div class="row fv-row">
                                                        <!--begin::Col-->
                                                        <div class="col-6">
                                                            <select id="card_expiry_month" name="card_expiry_month" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Month">
                                                                <option></option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col-6">
                                                            <select id="card_expiry_year" name="card_expiry_year" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Year">
                                                                <option></option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                                <option value="2030">2030</option>
                                                                <option value="2031">2031</option>
                                                                <option value="2032">2032</option>
                                                                <option value="2033">2033</option>
                                                                <option value="2034">2034</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Row-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-4 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                        <span class="required">CVV</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="Enter a card CVV code">
                                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input wrapper-->
                                                    <div class="position-relative">
                                                        <!--begin::Input-->
                                                        <input id="card_cvv" type="text" class="form-control form-control-solid" minlength="3" maxlength="4" placeholder="CVV" name="card_cvv" />
                                                        <!--end::Input-->
                                                        <!--begin::CVV icon-->
                                                        <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                            <i class="ki-duotone ki-credit-cart fs-2hx">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </div>
                                                        <!--end::CVV icon-->
                                                    </div>
                                                    <!--end::Input wrapper-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                                <div class="d-flex flex-stack">
                                                <!--begin::Label-->
                                                    <div class="me-5">
                                                        <label class="fs-6 fw-semibold form-label">Save Card for further billing?</label>
                                                        <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget planning</div>
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                                        <span class="form-check-label fw-semibold text-muted">Save Card</span>
                                                    </label>
                                                <!--end::Switch-->
                                                </div>
										    <!--end::Input group-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Step 4-->
                                    <!--begin::Step 5-->
                                    <div class="" data-kt-stepper-element="content">
                                        <!--begin::Wrapper-->
                                        <div class="w-100">
                                            <!--begin::Heading-->
                                            <div class="pb-8 pb-lg-10">
                                                <!--begin::Title-->
                                                <h2 class="fw-bold text-gray-900">Your Are Done!</h2>
                                                <!--end::Title-->
                                                <!--begin::Notice-->
                                                <div class="text-muted fw-semibold fs-6">If you need more info, please 
                                                <a href="login.php" class="link-primary fw-bold">Sign In</a>.</div>
                                                <!--end::Notice-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Body-->
                                            <div class="mb-0">
                                                <!--begin::Text-->
                                                <div class="fs-6 text-gray-600 mb-5">Writing headlines for blog posts is as much an art as it is a science and probably warrants its own post, but for all advise is with what works for your great & amazing audience.</div>
                                                <!--end::Text-->
                                                <!--begin::Alert-->
                                                <!--begin::Notice-->
                                                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                                    <!--begin::Icon-->
                                                    <i class="ki-duotone ki-information fs-2tx text-warning me-4">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                    <!--end::Icon-->
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex flex-stack flex-grow-1">
                                                        <!--begin::Content-->
                                                        <div class="fw-semibold">
                                                            <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                                                            <div class="fs-6 text-gray-700">To start using great tools, please, 
                                                            <a href="utilities/wizards/vertical.html" class="fw-bold">Create Team Platform</a></div>
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Notice-->
                                                <!--end::Alert-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Step 5-->
                                    <!--begin::Actions-->
                                    <div class="d-flex flex-stack pt-15">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                            <i class="ki-duotone ki-arrow-left fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>Previous</button>
                                        </div>
                                        <div>
                                            <button id="submit" type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                                <span class="indicator-label">Submit 
                                                <i class="ki-duotone ki-arrow-right fs-4 ms-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i></span>
                                                <span class="indicator-progress">Please wait... 
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue 
                                            <i class="ki-duotone ki-arrow-right fs-4 ms-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i></button>
                                        </div>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Authentication - Multi-steps-->
            </div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="assets/js/custom/utilities/modals/create-account.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->


<script>
    document.getElementById('submit').addEventListener('click', function() {
        const roleId = document.querySelector('input[name="account_type"]:checked').value;
        const account_team_size = document.querySelector('input[name="account_team_size"]:checked').value;
        const account_plan_id = document.querySelector('input[name="account_plan"]:checked').value;
        const business_type_id = document.getElementById('business_type').value;
        const username = document.getElementById('account_name').value;
        const password = document.getElementById('password').value;
        const business_name = document.getElementById('business_name').value;
        const business_descriptor = document.getElementById('business_descriptor').value;
        const business_description = document.getElementById('business_description').value;
        const email = document.getElementById('business_email').value;
        const card_name = document.getElementById('card_name').value;
        const card_number = document.getElementById('card_number').value;
        const card_expiry_month = document.getElementById('card_expiry_month').value;
        const card_expiry_year = document.getElementById('card_expiry_year').value;
        const card_cvv = document.getElementById('card_cvv').value;


        console.log('card_expiry_year:', card_expiry_year);
        console.log('card_expiry_month:', card_expiry_month);
        console.log('card_cvv:', card_cvv);
        console.log('card_name:', card_name);
        console.log('card_number:', card_number);
        console.log('business_email:', email);
        console.log('business_description:', business_description);
        console.log('business_descriptor:', business_descriptor);
        console.log('business_name:', business_name);
        console.log('business_type:', business_type_id);
        console.log('account plan:', account_plan_id);
        console.log('account name:', username);
        console.log('account type:', roleId);
        console.log('teamsize:', account_team_size);
        async function registerUser() {
            try {
                const response = await fetch('http://localhost:3000/users/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ username, password, roleId, account_team_size, account_plan_id, business_name, business_descriptor, business_description, email, card_name, card_number, card_cvv, card_expiry_year, card_expiry_month, business_type_id }),
                });

                // Check if the response is okay (status in the range 200-299)
                if (!response.ok) {
                    const errorData = await response.json();
                    alert(errorData.message); // Display the error message from the backend
                    return;
                }

                const data = await response.json(); // Parse the response as JSON
                if (data.status === 'success') {
                    localStorage.setItem('token', data.token); // Store the token in local storage
                } else {
                    alert(data.message); // Handle any other non-successful responses
                }
            } catch (error) {
                console.error('Error during login:', error);
                alert('An error occurred while processing your request.'); // Generic error message
            }
        }
        registerUser();
    });
</script>
