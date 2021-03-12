<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Traits\ValidationTrait as ValidationTrait;
use App\SubDomains as SubDomains;
use App\User as User;
use Hash;
use App\Traits\TableTrait as TableTrait;
use Illuminate\Support\Facades\Route; 

class SubDomainController extends CommonController
{
    use TableTrait;
	use ValidationTrait;
	public function index()
    {
        return view('subdomain-registration.index');
    }

    public function getsubdomaindata(Request $request)
    {
        $getsubdomains = SubDomains::getAll([],API_LIMIT,0);
        $status = 201;
        $response = array(
            'status' => 'SUCCESS',
            'data'   => $getsubdomains,
            'ref'    => 'get_sub_domains',
        );
        return $this->response($response,$status);  
    }

    /**
     * @desc Add Sub Domain and create primary user
     * @param  POST DATA (first_name,last_name,subdomain,email,phone_number,referral_link)
     * @return Array()
     */

	public function subdomaincreate(Request $request)
	{
		$rules = [
            'first_name' => 'required|min:3|max:30',
            'last_name'  => 'required|min:3|max:30',
            'subdomain'  => 'required|min:3|max:10',
            'email'      => 'required|email',
            'phone_number' => 'required|min:11',
            'referral_link' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) {
        	$requestData = $request->all();
        	$custom_validate = $this->createsubdomain_validation($requestData);
        	if($custom_validate['status'])
        	{                                
        		$add_subdomain = SubDomains::add([
                    'first_name' => $requestData['first_name'],
                    'last_name' => $requestData['last_name'],
                    'email' => $requestData['email'],
                    'phone_number' => $requestData['phone_number'],
                    'referral_link' => $requestData['referral_link'],
                    'subdomain'  => strtolower($requestData['subdomain'])
                ]); 

               
        		if($add_subdomain)
        		{
                    /* Email Sent Start */
                    $email_data = $add_subdomain;
                    $email_template = view('email.email',$email_data)->render();
                    SendGridMail($requestData['email'],'Superb Opportunity Registration',$email_template,"Content-Type: text/html; charset=ISO-8859-1\r\n"); 
                    /* Email Sent End */
                    
                    $status = 201;
                    $response = array(
                        'status' => 'SUCCESS',
                        'data'   => ['subdomain_id' => $add_subdomain['id']],
                        'ref'    => 'subdomain_created',
                    );
        		}
        		else
        		{
        			$status = 500;
                    $response = array(
                        'status'  => 'FAILED',
                        'message' => trans('messages.server_error'),
                        'ref'     => 'server_error',
                    );
        		} 
            }
            else
	        {
	            $status = 400;
	            $response = array(
	                'status'  => 'FAILED',
	                'message' => $custom_validate['message'],
	                'ref'     => $custom_validate['ref'],
	            );
	        }
        } else {
            $status = 400;
            $response = array(
                'status'  => 'FAILED',
                'message' => $validator->messages()->first(),
                'ref'     => 'missing_parameters',
            );
        }

        return $this->response($response,$status);  
	}


    public function success($subdomainID)
    {
        $is_subdomain_exists = SubDomains::where(['id' => (int) $subdomainID,"status" => '1' ,"deleted" => '0'])->first();
        if($is_subdomain_exists)
        {
            $data['is_subdomain_exists'] = $is_subdomain_exists;
            echo $this->view('success',$data);
        }
        else
        {
            print_r("Invalid Subdomain Id");
            exit();
        }
    }

    public function landingpage(Request $request)
    {
        $currentURL = url()->current();
        $subdomain = $subdomain = join('.', explode('.', $_SERVER['HTTP_HOST'], -2));
        // dd($subdomain);
        // echo $this->view('subdomain.landing',[]);
        $is_subdomain_exists = SubDomains::where(['subdomain' => $subdomain, "status" => '1' ,"deleted" => '0'])->first();
        if($is_subdomain_exists)
        {
            $data['is_subdomain_exists'] = $is_subdomain_exists;
            echo $this->view('subdomain.landing',$data);
        }
        else
        {
            print_r("Invalid Subdomain Id");
            exit();
        }
    }






    /**
     * @desc Add Sub Domain and create primary user
     * @param  POST DATA (subdomain,email,password)
     * @return Array()
     */
    public function subdomainuserlogin(Request $request)
    {
        $rules = [
            'subdomain' => 'required|min:3|max:10',
            'email' => 'required|email',
            'password' => 'required|min:3|max:30'
        ];

        $validator = Validator::make($request->all(),$rules);

        if (!$validator->fails()) {
            $requestData = $request->all();
            $custom_validate = $this->subdomainuserlogin_validation($requestData);
            if($custom_validate['status'])
            {
                $status = 201;
                $response = array(
                    'status' => 'SUCCESS',
                    'data'   => ['restaurant_id' => $custom_validate['restaurant']['id']],
                    'ref'    => 'login_success',
                );
            }
            else
            {
                $status = 400;
                $response = array(
                    'status'  => 'FAILED',
                    'message' => $custom_validate['message'],
                    'ref'     => $custom_validate['ref'],
                );
            }
        } else {
            $status = 400;
            $response = array(
                'status'  => 'FAILED',
                'message' => $validator->messages()->first(),
                'ref'     => 'missing_parameters',
            );
        }
        return $this->response($response,$status);
    }
}