@extends('layouts.frontend-app')
@section('title', 'Business Advertising')
@section('content')
	<!--Breadcrumb Secton Start-->
	<div class="breadcrumb_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb_area">
						<h3>Advertise With Us</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Breadcrumb Secton End-->

	<!--Plan Section Start-->
	<div class="main">
	    <table class="price-table">
	        <tbody>
	            <tr>
	                <td class="price-blank"></td>
	                <td class="price-blank"></td>
	                <td class="price-table-popular">Most popular</td>
	                <td class="price-blank"></td>
	            </tr>
	            <tr class="price-table-head">
	                <td></td>
	                <td>
	                    Free
	                    <br><small style="font-size: 12px; font-weight: 400;">Starter plan</small>
	                </td>
	                <td>
	                    Personal
	                    <br><small style="font-size: 12px; font-weight: 400;">Longer data retention</small>
	                </td>
	                <td class="green-width">
	                    Pro
	                    <br><small style="font-size: 12px; font-weight: 400;">Our complete solution</small>
	                </td>
	            </tr>
	            <tr>
	                <td><a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Sites</td>
	                <td>1</td>
	                <td>1</td>
	                <td>1</td>
	            </tr>
	            <tr>
	                <td><a href="#wordpress-core-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Data Retention</td>
	                <td>30 Days</td>
	                <td>90 Days</td>
	                <td>180 Days</td>
	            </tr>
	            <tr>
	                <td><a href="#wordpress-security-monitoring" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Chart Annotations</td>
	                <td><i class="fas fa-times"></i></td>
	                <td><i class="fas fa-check"></i></td>
	                <td><i class="fas fa-check"></i></td>
	            </tr>
	            <tr>
	                <td><a href="#wordpress-uptime-monitoring" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Uptime Monitoring</td>
	                <td><i class="fas fa-times"></i></td>
	                <td><i class="fas fa-check"></i></td>
	                <td><i class="fas fa-check"></i></td>
	            </tr>
	            <tr>
	                <td><a href="#wordpress-malware-cleanup" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Weekly Reports</td>
	                <td><i class="fas fa-times"></i></td>
	                <td><i class="fas fa-check"></i></td>
	                <td><i class="fas fa-check"></i></td>
	            </tr>
	            <tr>
	                <td><a href="#wordpress-security-audit" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Security Audit</td>
	                <td><i class="fas fa-times"></i></td>
	                <td><i class="fas fa-check"></i></td>
	                <td><i class="fas fa-check"></i></td>
	            </tr>
	            <tr>
	                <td><a href="#wordpress-security-audit" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> On-Demand Audit</td>
	                <td><i class="fas fa-times"></i></td>
	                <td><i class="fas fa-times"></i></td>
	                <td><i class="fas fa-check"></i></td>
	            </tr>
	            <tr>
	                <td><a href="#wordpress-priority-support" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Priority Support</td>
	                <td><i class="fas fa-times"></i></td>
	                <td><i class="fas fa-times"></i></td>
	                <td><i class="fas fa-check"></i></td>
	            </tr>
	            <tr>
	                <td><a href="#wordpress-billing" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Easy Billing + No Contracts</td>
	                <td><i class="fas fa-check"></i></td>
	                <td><i class="fas fa-check"></i></td>
	                <td><i class="fas fa-check"></i></td>
	            </tr>
	            <tr>
	                <td></td>
	                <td class="price">
	                    <a href="#">Get started</a>
	                </td>
	                <td class="price">
	                    <a href="#">Get started</a>
	                </td>
	                <td class="price">
	                    <a href="#">Get started</a>
	                </td>
	            </tr>
	        </tbody>
	    </table>
	</div>
	<!--Plan Section End-->
@endsection