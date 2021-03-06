<?php

namespace App\Controller;

use App\Entity\Recruitment\Recruiter;
use App\Service\Recruitment\UserService;
use Gesdinet\JWTRefreshTokenBundle\Entity\RefreshToken;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CTASController extends Controller {
	
	/**
	 * @Route("/ctas/recruiter/initiate", name="app_api_recruiter_initiate"
	 * )
	 */
	public function initiateRecruiter(Request $request) {
		$recruiterId      = $request->get('_username', '0');
		$adminEmail       = $request->get('_password', 'noadmin-provided@gmail.com');
		$recruiterService = $this->get('app.user');
		$recruiter        = $recruiterService->initiateRecruiter($recruiterId, $adminEmail);
		$jwt              = $recruiterService->generateTokenFromRecruiter($recruiter);
		
		return new JsonResponse([ "token" => $jwt, 'recruiter_uri' => '/api/recruiters/' . $recruiter->getId() ]);
	}
}