PGDMP                         {            swm_erp    12.0    14.4 M   Z           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            [           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            \           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ]           1262    160963    swm_erp    DATABASE     c   CREATE DATABASE swm_erp WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_India.1252';
    DROP DATABASE swm_erp;
                postgres    false            �            1259    160964 "   tbl_account_income_expense_details    TABLE     �  CREATE TABLE public.tbl_account_income_expense_details (
    _id bigint NOT NULL,
    income_expense character varying(20),
    account_type character varying(20),
    transaction_date_time timestamp without time zone,
    payment_mode_id bigint,
    transaction_type character varying(100),
    payer_payee_name character varying(50),
    profit_amount numeric(18,2),
    loss_amount numeric(18,2),
    created_by bigint,
    transaction_id bigint,
    _status integer DEFAULT 1
);
 6   DROP TABLE public.tbl_account_income_expense_details;
       public         heap    postgres    false            �            1259    160968 *   tbl_account_income_expense_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_account_income_expense_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 A   DROP SEQUENCE public.tbl_account_income_expense_details__id_seq;
       public          postgres    false    202            ^           0    0 *   tbl_account_income_expense_details__id_seq    SEQUENCE OWNED BY     y   ALTER SEQUENCE public.tbl_account_income_expense_details__id_seq OWNED BY public.tbl_account_income_expense_details._id;
          public          postgres    false    203            �            1259    160970 #   tbl_asset_assigned_employee_details    TABLE     �  CREATE TABLE public.tbl_asset_assigned_employee_details (
    _id bigint NOT NULL,
    asset_model_id bigint,
    assigned_employee_id bigint,
    asset_type character varying(20) DEFAULT NULL::character varying,
    item_name_id bigint,
    sub_item_name_id bigint,
    created_by bigint,
    created_on timestamp without time zone,
    _status integer DEFAULT 1,
    asset_model_no_id bigint,
    quantity bigint
);
 7   DROP TABLE public.tbl_asset_assigned_employee_details;
       public         heap    postgres    false            �            1259    160975 +   tbl_asset_assigned_employee_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_asset_assigned_employee_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 B   DROP SEQUENCE public.tbl_asset_assigned_employee_details__id_seq;
       public          postgres    false    204            _           0    0 +   tbl_asset_assigned_employee_details__id_seq    SEQUENCE OWNED BY     {   ALTER SEQUENCE public.tbl_asset_assigned_employee_details__id_seq OWNED BY public.tbl_asset_assigned_employee_details._id;
          public          postgres    false    205            �            1259    160977    tbl_asset_details    TABLE       CREATE TABLE public.tbl_asset_details (
    _id bigint NOT NULL,
    asset_type character varying(30) DEFAULT NULL::character varying,
    item_name_id bigint,
    sub_item_name_id bigint,
    asset_model_no_id bigint,
    supplier_name character varying(50) DEFAULT NULL::character varying,
    supplier_address text,
    supplier_contact_no character varying(20) DEFAULT NULL::character varying,
    order_no character varying(30) DEFAULT NULL::character varying,
    purchase_cost numeric(10,2) DEFAULT NULL::numeric,
    warranty_month_no character varying(10) DEFAULT NULL::character varying,
    purchase_date character varying(20) DEFAULT NULL::character varying,
    expiry_date character varying(20) DEFAULT NULL::character varying,
    manufacturer_name character varying(50) DEFAULT NULL::character varying,
    bill_attachment character varying(255) DEFAULT NULL::character varying,
    remarks text,
    created_on timestamp without time zone,
    created_by bigint,
    _status integer DEFAULT 1,
    asset_quantity integer
);
 %   DROP TABLE public.tbl_asset_details;
       public         heap    postgres    false            �            1259    160994    tbl_asset_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_asset_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.tbl_asset_details__id_seq;
       public          postgres    false    206            `           0    0    tbl_asset_details__id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.tbl_asset_details__id_seq OWNED BY public.tbl_asset_details._id;
          public          postgres    false    207            �            1259    160996    tbl_asset_inventory_details    TABLE     r  CREATE TABLE public.tbl_asset_inventory_details (
    _id integer NOT NULL,
    quit_id bigint,
    item_name_id bigint,
    sub_item_name_id bigint,
    serial_no_id character varying,
    condition_status character varying,
    created_on timestamp without time zone,
    created_by bigint,
    _status character varying DEFAULT 1,
    penalty_amount numeric(10,2)
);
 /   DROP TABLE public.tbl_asset_inventory_details;
       public         heap    postgres    false            �            1259    161003 '   tbl_asset_inventory_details_user_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_asset_inventory_details_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 >   DROP SEQUENCE public.tbl_asset_inventory_details_user_id_seq;
       public          postgres    false    208            a           0    0 '   tbl_asset_inventory_details_user_id_seq    SEQUENCE OWNED BY     o   ALTER SEQUENCE public.tbl_asset_inventory_details_user_id_seq OWNED BY public.tbl_asset_inventory_details._id;
          public          postgres    false    209            �            1259    161005    tbl_asset_model_list    TABLE       CREATE TABLE public.tbl_asset_model_list (
    _id bigint NOT NULL,
    asset_details_id bigint,
    asset_barcode_no character varying(30) DEFAULT NULL::character varying,
    asset_serial_no character varying(40) DEFAULT NULL::character varying,
    asset_status character varying(30) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    created_by bigint,
    _status integer DEFAULT 1,
    asset_type character varying(30),
    item_name_id bigint,
    sub_item_name_id bigint,
    asset_model_no_id bigint
);
 (   DROP TABLE public.tbl_asset_model_list;
       public         heap    postgres    false            �            1259    161012    tbl_asset_model_list__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_asset_model_list__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.tbl_asset_model_list__id_seq;
       public          postgres    false    210            b           0    0    tbl_asset_model_list__id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.tbl_asset_model_list__id_seq OWNED BY public.tbl_asset_model_list._id;
          public          postgres    false    211            �            1259    161014    tbl_asset_model_no_mstr    TABLE     �   CREATE TABLE public.tbl_asset_model_no_mstr (
    _id bigint NOT NULL,
    item_name_id bigint,
    sub_item_name_id bigint,
    model_no character varying(30) DEFAULT NULL::character varying,
    _status integer DEFAULT 1
);
 +   DROP TABLE public.tbl_asset_model_no_mstr;
       public         heap    postgres    false            �            1259    161019    tbl_asset_model_no_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_asset_model_no_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.tbl_asset_model_no_mstr__id_seq;
       public          postgres    false    212            c           0    0    tbl_asset_model_no_mstr__id_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.tbl_asset_model_no_mstr__id_seq OWNED BY public.tbl_asset_model_no_mstr._id;
          public          postgres    false    213            �            1259    161021 !   tbl_asset_model_repairing_details    TABLE     �  CREATE TABLE public.tbl_asset_model_repairing_details (
    _id bigint NOT NULL,
    asset_details_id bigint,
    asset_model_id bigint,
    repairing_date character varying(20) DEFAULT NULL::character varying,
    charge_amount character varying(40) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    created_by bigint,
    _status integer DEFAULT 1
);
 5   DROP TABLE public.tbl_asset_model_repairing_details;
       public         heap    postgres    false            �            1259    161027 )   tbl_asset_model_repairing_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_asset_model_repairing_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 @   DROP SEQUENCE public.tbl_asset_model_repairing_details__id_seq;
       public          postgres    false    214            d           0    0 )   tbl_asset_model_repairing_details__id_seq    SEQUENCE OWNED BY     w   ALTER SEQUENCE public.tbl_asset_model_repairing_details__id_seq OWNED BY public.tbl_asset_model_repairing_details._id;
          public          postgres    false    215            �            1259    161029    tbl_candidate_details    TABLE        CREATE TABLE public.tbl_candidate_details (
    _id bigint NOT NULL,
    job_post_details_id bigint,
    department_mstr_id bigint,
    designation_mstr_id bigint,
    ref_code character varying(50) DEFAULT NULL::character varying,
    first_name character varying(50) DEFAULT NULL::character varying,
    middle_name character varying(50) DEFAULT NULL::character varying,
    last_name character varying(50) DEFAULT NULL::character varying,
    present_address character varying(255) DEFAULT NULL::character varying,
    present_city character varying(100) DEFAULT NULL::character varying,
    present_district character varying(100) DEFAULT NULL::character varying,
    present_state character varying(100) DEFAULT NULL::character varying,
    present_pin_code character varying(100) DEFAULT NULL::character varying,
    permanent_address character varying(255) DEFAULT NULL::character varying,
    permanent_city character varying(100) DEFAULT NULL::character varying,
    permanent_district character varying(100) DEFAULT NULL::character varying,
    permanent_state character varying(100) DEFAULT NULL::character varying,
    permanent_pin_code character varying(100) DEFAULT NULL::character varying,
    d_o_b date,
    gender character varying(10) DEFAULT NULL::character varying,
    marital_status character varying(15) DEFAULT NULL::character varying,
    spouse_name character varying(150) DEFAULT NULL::character varying,
    height character varying(150) DEFAULT NULL::character varying,
    weight character varying(150) DEFAULT NULL::character varying,
    blood_group character varying(10) DEFAULT NULL::character varying,
    personal_phone_no character varying(15) DEFAULT NULL::character varying,
    other_phone_no character varying(15) DEFAULT NULL::character varying,
    email_id character varying(35) DEFAULT NULL::character varying,
    photo_path character varying(100) DEFAULT NULL::character varying,
    joining_date date,
    provident_fund_no character varying(50) DEFAULT NULL::character varying,
    employee_state_insurance_no character varying(50) DEFAULT NULL::character varying,
    experience_overall_relevant text,
    mentioned_any_special_information text,
    languages_know character varying(255) DEFAULT NULL::character varying,
    leisure_activity text,
    relations_working_in_this_company text,
    your_state_of_health text,
    services_agreement boolean,
    are_you_willing_to_be_posted_anywhere_in_india boolean,
    have_you_applied_before_in_this_company boolean,
    created_by_emp_detais_id bigint,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    recruitment_status integer,
    recruitment_accept_reject_by_emp_details_id bigint,
    recruitment_reject_remarks character varying(255) DEFAULT NULL::character varying,
    negotiation_status integer,
    negotiation_by_emp_details_id bigint,
    negotiation_reject_remarks character varying(255) DEFAULT NULL::character varying,
    _status integer DEFAULT 1,
    step_status integer,
    offer_letter_path character varying(255) DEFAULT NULL::character varying,
    offer_letter_given_timestamp timestamp without time zone,
    offer_letter_send_by_emp_details character varying(255) DEFAULT NULL::character varying,
    deactivate_status integer DEFAULT 0,
    deactivate_comment character varying(150)
);
 )   DROP TABLE public.tbl_candidate_details;
       public         heap    postgres    false            �            1259    161068    tbl_candidate_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_candidate_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.tbl_candidate_details__id_seq;
       public          postgres    false    216            e           0    0    tbl_candidate_details__id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.tbl_candidate_details__id_seq OWNED BY public.tbl_candidate_details._id;
          public          postgres    false    217            �            1259    161070    tbl_candidate_document_details    TABLE     O  CREATE TABLE public.tbl_candidate_document_details (
    _id bigint NOT NULL,
    candidate_details_id bigint,
    doc_type_mstr_id bigint,
    other_doc_name character varying(100) DEFAULT NULL::character varying,
    doc_no character varying(50) DEFAULT NULL::character varying,
    date_of_issue date,
    place_of_issue character varying(100) DEFAULT NULL::character varying,
    valid_upto date,
    doc_path character varying(150) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1
);
 2   DROP TABLE public.tbl_candidate_document_details;
       public         heap    postgres    false            �            1259    161078 &   tbl_candidate_document_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_candidate_document_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 =   DROP SEQUENCE public.tbl_candidate_document_details__id_seq;
       public          postgres    false    218            f           0    0 &   tbl_candidate_document_details__id_seq    SEQUENCE OWNED BY     q   ALTER SEQUENCE public.tbl_candidate_document_details__id_seq OWNED BY public.tbl_candidate_document_details._id;
          public          postgres    false    219            �            1259    161080    tbl_candidate_family_backbgound    TABLE       CREATE TABLE public.tbl_candidate_family_backbgound (
    _id bigint NOT NULL,
    candidate_details_id bigint,
    father_name character varying(150) DEFAULT NULL::character varying,
    father_occupation character varying(150) DEFAULT NULL::character varying,
    father_contact_no character varying(150) DEFAULT NULL::character varying,
    father_address character varying(150) DEFAULT NULL::character varying,
    mother_name character varying(150) DEFAULT NULL::character varying,
    mother_occupation character varying(150) DEFAULT NULL::character varying,
    mother_contact_no character varying(150) DEFAULT NULL::character varying,
    mother_address character varying(150) DEFAULT NULL::character varying,
    brother_name character varying(150) DEFAULT NULL::character varying,
    brother_occupation character varying(150) DEFAULT NULL::character varying,
    brother_contact_no character varying(150) DEFAULT NULL::character varying,
    brother_address character varying(150) DEFAULT NULL::character varying,
    sister_name character varying(150) DEFAULT NULL::character varying,
    sister_occupation character varying(150) DEFAULT NULL::character varying,
    sister_contact_no character varying(150) DEFAULT NULL::character varying,
    sister_address character varying(150) DEFAULT NULL::character varying,
    brother_in_law_name character varying(150) DEFAULT NULL::character varying,
    brother_in_law_occupation character varying(150) DEFAULT NULL::character varying,
    brother_in_law_contact_no character varying(150) DEFAULT NULL::character varying,
    brother_in_law_address character varying(150) DEFAULT NULL::character varying,
    spouse_name character varying(150) DEFAULT NULL::character varying,
    spouse_occupation character varying(150) DEFAULT NULL::character varying,
    spouse_contact_no character varying(150) DEFAULT NULL::character varying,
    spouse_address character varying(150) DEFAULT NULL::character varying,
    friend1_name character varying(150) DEFAULT NULL::character varying,
    friend1_occupation character varying(150) DEFAULT NULL::character varying,
    friend1_contact_no character varying(150) DEFAULT NULL::character varying,
    friend1_address character varying(150) DEFAULT NULL::character varying,
    friend2_name character varying(150) DEFAULT NULL::character varying,
    friend2_occupation character varying(150) DEFAULT NULL::character varying,
    friend2_contact_no character varying(150) DEFAULT NULL::character varying,
    friend2_address character varying(150) DEFAULT NULL::character varying,
    relative1_name character varying(150) DEFAULT NULL::character varying,
    relative1_occupation character varying(150) DEFAULT NULL::character varying,
    relative1_contact_no character varying(150) DEFAULT NULL::character varying,
    relative1_address character varying(150) DEFAULT NULL::character varying,
    relative2_name character varying(150) DEFAULT NULL::character varying,
    relative2_occupation character varying(150) DEFAULT NULL::character varying,
    relative2_contact_no character varying(150) DEFAULT NULL::character varying,
    relative2_address character varying(150) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1
);
 3   DROP TABLE public.tbl_candidate_family_backbgound;
       public         heap    postgres    false            �            1259    161127 '   tbl_candidate_family_backbgound__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_candidate_family_backbgound__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 >   DROP SEQUENCE public.tbl_candidate_family_backbgound__id_seq;
       public          postgres    false    220            g           0    0 '   tbl_candidate_family_backbgound__id_seq    SEQUENCE OWNED BY     s   ALTER SEQUENCE public.tbl_candidate_family_backbgound__id_seq OWNED BY public.tbl_candidate_family_backbgound._id;
          public          postgres    false    221            �            1259    161129 +   tbl_candidate_first_round_interview_details    TABLE     �  CREATE TABLE public.tbl_candidate_first_round_interview_details (
    _id bigint NOT NULL,
    candidate_id bigint,
    interview_round_id bigint,
    round_status bigint,
    remarks text,
    created_by bigint,
    date_time timestamp without time zone,
    _status integer DEFAULT 1,
    performance character varying(255) DEFAULT NULL::character varying,
    secondrounddate date,
    secondroundtime time without time zone
);
 ?   DROP TABLE public.tbl_candidate_first_round_interview_details;
       public         heap    postgres    false            �            1259    161137 3   tbl_candidate_first_round_interview_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_candidate_first_round_interview_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 J   DROP SEQUENCE public.tbl_candidate_first_round_interview_details__id_seq;
       public          postgres    false    222            h           0    0 3   tbl_candidate_first_round_interview_details__id_seq    SEQUENCE OWNED BY     �   ALTER SEQUENCE public.tbl_candidate_first_round_interview_details__id_seq OWNED BY public.tbl_candidate_first_round_interview_details._id;
          public          postgres    false    223            �            1259    161139 $   tbl_candidate_interview_call_details    TABLE     m  CREATE TABLE public.tbl_candidate_interview_call_details (
    _id bigint NOT NULL,
    candidate_id bigint,
    interview_venue_id bigint,
    designation_id bigint,
    interview_date date,
    interview_time character varying(10) DEFAULT NULL::character varying,
    date_time timestamp without time zone,
    created_on bigint,
    _status integer DEFAULT 1
);
 8   DROP TABLE public.tbl_candidate_interview_call_details;
       public         heap    postgres    false            �            1259    161144 ,   tbl_candidate_interview_call_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_candidate_interview_call_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 C   DROP SEQUENCE public.tbl_candidate_interview_call_details__id_seq;
       public          postgres    false    224            i           0    0 ,   tbl_candidate_interview_call_details__id_seq    SEQUENCE OWNED BY     }   ALTER SEQUENCE public.tbl_candidate_interview_call_details__id_seq OWNED BY public.tbl_candidate_interview_call_details._id;
          public          postgres    false    225            �            1259    161146 &   tbl_candidate_interview_result_details    TABLE       CREATE TABLE public.tbl_candidate_interview_result_details (
    _id bigint NOT NULL,
    candidate_id bigint,
    interview_round_id bigint,
    round_status bigint,
    remarks text,
    date_time timestamp without time zone,
    _status integer DEFAULT 1
);
 :   DROP TABLE public.tbl_candidate_interview_result_details;
       public         heap    postgres    false            �            1259    161153 .   tbl_candidate_interview_result_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_candidate_interview_result_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 E   DROP SEQUENCE public.tbl_candidate_interview_result_details__id_seq;
       public          postgres    false    226            j           0    0 .   tbl_candidate_interview_result_details__id_seq    SEQUENCE OWNED BY     �   ALTER SEQUENCE public.tbl_candidate_interview_result_details__id_seq OWNED BY public.tbl_candidate_interview_result_details._id;
          public          postgres    false    227            �            1259    161155     tbl_candidate_present_employment    TABLE     J  CREATE TABLE public.tbl_candidate_present_employment (
    _id bigint NOT NULL,
    candidate_details_id bigint,
    present_name_of_employer character varying(255) DEFAULT NULL::character varying,
    present_address_of_organisation character varying(255) DEFAULT NULL::character varying,
    present_date_of_joining_from date,
    present_brief_desc_of_present_job text,
    present_basic_salary numeric(18,2) DEFAULT NULL::numeric,
    present_hra numeric(18,2) DEFAULT NULL::numeric,
    present_total_monthly_amt numeric(18,2) DEFAULT NULL::numeric,
    present_other_emoluments_pf_lta_medical character varying(255) DEFAULT NULL::character varying,
    present_any_benefits_facilities character varying(255) DEFAULT NULL::character varying,
    present_expected_salary_pf_contribution_bonus character varying(255) DEFAULT NULL::character varying,
    present_join_notice_period character varying(255) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1,
    present_date_of_joining_to date
);
 4   DROP TABLE public.tbl_candidate_present_employment;
       public         heap    postgres    false            �            1259    161171 (   tbl_candidate_present_employment__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_candidate_present_employment__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ?   DROP SEQUENCE public.tbl_candidate_present_employment__id_seq;
       public          postgres    false    228            k           0    0 (   tbl_candidate_present_employment__id_seq    SEQUENCE OWNED BY     u   ALTER SEQUENCE public.tbl_candidate_present_employment__id_seq OWNED BY public.tbl_candidate_present_employment._id;
          public          postgres    false    229            �            1259    161173 )   tbl_candidate_previous_employment_details    TABLE     �  CREATE TABLE public.tbl_candidate_previous_employment_details (
    _id bigint NOT NULL,
    candidate_details_id bigint,
    previous_period_from date,
    previous_period_to date,
    previous_experience character varying(50) DEFAULT NULL::character varying,
    previous_organization_name_address character varying(255) DEFAULT NULL::character varying,
    previous_designation character varying(255) DEFAULT NULL::character varying,
    previous_monthly_emoluments numeric(18,2) DEFAULT NULL::numeric,
    previous_brief_job_description text,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1
);
 =   DROP TABLE public.tbl_candidate_previous_employment_details;
       public         heap    postgres    false            �            1259    161184 1   tbl_candidate_previous_employment_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_candidate_previous_employment_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 H   DROP SEQUENCE public.tbl_candidate_previous_employment_details__id_seq;
       public          postgres    false    230            l           0    0 1   tbl_candidate_previous_employment_details__id_seq    SEQUENCE OWNED BY     �   ALTER SEQUENCE public.tbl_candidate_previous_employment_details__id_seq OWNED BY public.tbl_candidate_previous_employment_details._id;
          public          postgres    false    231            �            1259    161186 #   tbl_candidate_qualification_details    TABLE     c  CREATE TABLE public.tbl_candidate_qualification_details (
    _id bigint NOT NULL,
    candidate_details_id bigint,
    course_mstr_id bigint,
    other_course character varying(100) DEFAULT NULL::character varying,
    medium_type character varying(50) DEFAULT NULL::character varying,
    passing_year character varying(10) DEFAULT NULL::character varying,
    school_college_institute_name character varying(250) DEFAULT NULL::character varying,
    board_university_name character varying(150) DEFAULT NULL::character varying,
    marks_percent character varying(10) DEFAULT NULL::character varying,
    attachment_doc_path character varying(150) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1,
    sub_course_mstr_id bigint,
    sub_stream_mstr_id bigint
);
 7   DROP TABLE public.tbl_candidate_qualification_details;
       public         heap    postgres    false            �            1259    161200 +   tbl_candidate_qualification_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_candidate_qualification_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 B   DROP SEQUENCE public.tbl_candidate_qualification_details__id_seq;
       public          postgres    false    232            m           0    0 +   tbl_candidate_qualification_details__id_seq    SEQUENCE OWNED BY     {   ALTER SEQUENCE public.tbl_candidate_qualification_details__id_seq OWNED BY public.tbl_candidate_qualification_details._id;
          public          postgres    false    233            �            1259    161202    tbl_candidate_references    TABLE     z  CREATE TABLE public.tbl_candidate_references (
    _id bigint NOT NULL,
    candidate_details_id bigint,
    reference_name_designation_organisation1 text,
    reference_phone_no_email_id1 character varying(60) DEFAULT NULL::character varying,
    reference_address_of_communication1 character varying(255) DEFAULT NULL::character varying,
    reference_social_professinal1 character varying(50) DEFAULT NULL::character varying,
    reference_name_designation_organisation2 text,
    reference_phone_no_email_id2 character varying(60) DEFAULT NULL::character varying,
    reference_address_of_communication2 character varying(255) DEFAULT NULL::character varying,
    reference_social_professinal2 character varying(50) DEFAULT NULL::character varying,
    reference_name_designation_organisation3 text,
    reference_phone_no_email_id3 character varying(60) DEFAULT NULL::character varying,
    reference_address_of_communication3 character varying(255) DEFAULT NULL::character varying,
    reference_social_professinal3 character varying(50) DEFAULT NULL::character varying,
    reference_name_designation_organisation4 text,
    reference_phone_no_email_id4 character varying(60) DEFAULT NULL::character varying,
    reference_address_of_communication4 character varying(255) DEFAULT NULL::character varying,
    reference_social_professinal4 character varying(50) DEFAULT NULL::character varying,
    reference_name_designation_organisation5 text,
    reference_phone_no_email_id5 character varying(60) DEFAULT NULL::character varying,
    reference_address_of_communication5 character varying(255) DEFAULT NULL::character varying,
    reference_social_professinal5 character varying(50) DEFAULT NULL::character varying,
    reference_name_designation_organisation6 text,
    reference_phone_no_email_id6 character varying(60) DEFAULT NULL::character varying,
    reference_address_of_communication6 character varying(255) DEFAULT NULL::character varying,
    reference_social_professinal6 character varying(50) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1
);
 ,   DROP TABLE public.tbl_candidate_references;
       public         heap    postgres    false            �            1259    161227     tbl_candidate_references__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_candidate_references__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.tbl_candidate_references__id_seq;
       public          postgres    false    234            n           0    0     tbl_candidate_references__id_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public.tbl_candidate_references__id_seq OWNED BY public.tbl_candidate_references._id;
          public          postgres    false    235            �            1259    161229 ,   tbl_candidate_second_round_interview_details    TABLE     �  CREATE TABLE public.tbl_candidate_second_round_interview_details (
    _id bigint NOT NULL,
    candidate_id bigint,
    interview_round_id bigint,
    basic_salary numeric(10,2) DEFAULT NULL::numeric,
    round_status bigint,
    remarks text,
    created_by bigint,
    date_time timestamp without time zone,
    _status integer DEFAULT 1,
    date_of_joining date,
    performance character varying(255) DEFAULT NULL::character varying
);
 @   DROP TABLE public.tbl_candidate_second_round_interview_details;
       public         heap    postgres    false            �            1259    161238 4   tbl_candidate_second_round_interview_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_candidate_second_round_interview_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 K   DROP SEQUENCE public.tbl_candidate_second_round_interview_details__id_seq;
       public          postgres    false    236            o           0    0 4   tbl_candidate_second_round_interview_details__id_seq    SEQUENCE OWNED BY     �   ALTER SEQUENCE public.tbl_candidate_second_round_interview_details__id_seq OWNED BY public.tbl_candidate_second_round_interview_details._id;
          public          postgres    false    237            �            1259    161240    tbl_collection    TABLE     P  CREATE TABLE public.tbl_collection (
    _id bigint NOT NULL,
    payer_payee_id bigint,
    transaction_id bigint,
    generate_id bigint,
    paid_amt numeric(10,2) DEFAULT NULL::numeric,
    month_year character varying(20) DEFAULT NULL::character varying,
    _status integer DEFAULT 1,
    asset_fine_charge numeric(10,2),
    transaction_type character varying(100),
    payer_payee_name character varying(50),
    accounting_equation character varying(50),
    remarks text,
    doc_path character varying(255),
    bill_voucher_no character varying(100),
    tax_amt numeric(10,2)
);
 "   DROP TABLE public.tbl_collection;
       public         heap    postgres    false            �            1259    161249    tbl_collection__id_seq    SEQUENCE        CREATE SEQUENCE public.tbl_collection__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.tbl_collection__id_seq;
       public          postgres    false    238            p           0    0    tbl_collection__id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.tbl_collection__id_seq OWNED BY public.tbl_collection._id;
          public          postgres    false    239            �            1259    161251    tbl_company_details    TABLE     2  CREATE TABLE public.tbl_company_details (
    _id integer NOT NULL,
    company_name character varying NOT NULL,
    website character varying NOT NULL,
    cin_no character varying,
    pan_no character varying,
    tin_no character varying,
    tds_no character varying,
    _status integer DEFAULT 1
);
 '   DROP TABLE public.tbl_company_details;
       public         heap    postgres    false            �            1259    161258    tbl_company_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_company_details__id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.tbl_company_details__id_seq;
       public          postgres    false    240            q           0    0    tbl_company_details__id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.tbl_company_details__id_seq OWNED BY public.tbl_company_details._id;
          public          postgres    false    241            �            1259    161260    tbl_company_location    TABLE     s  CREATE TABLE public.tbl_company_location (
    _id bigint NOT NULL,
    company_id bigint,
    address text,
    gstin_no character varying(100) DEFAULT NULL::character varying,
    contact_no character varying(100) DEFAULT NULL::character varying,
    email_id character varying(100) DEFAULT NULL::character varying,
    office_type character varying(50) DEFAULT NULL::character varying,
    remark character varying,
    deactivated_by integer,
    deactivated_date date,
    re_activated_date date,
    re_activated_by integer,
    _status integer DEFAULT 1,
    landmark character varying,
    state_dist_city_id bigint
);
 (   DROP TABLE public.tbl_company_location;
       public         heap    postgres    false            �            1259    161271    tbl_company_location__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_company_location__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.tbl_company_location__id_seq;
       public          postgres    false    242            r           0    0    tbl_company_location__id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.tbl_company_location__id_seq OWNED BY public.tbl_company_location._id;
          public          postgres    false    243            �            1259    161273    tbl_contact_address_detail    TABLE     B  CREATE TABLE public.tbl_contact_address_detail (
    _id bigint NOT NULL,
    address_type integer,
    contact_id bigint,
    attention character varying(100),
    address character varying(200),
    phoneno character varying(20),
    is_default integer DEFAULT 0,
    _status integer DEFAULT 1,
    state_name bigint
);
 .   DROP TABLE public.tbl_contact_address_detail;
       public         heap    postgres    false            �            1259    161278 "   tbl_contact_address_detail__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_contact_address_detail__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public.tbl_contact_address_detail__id_seq;
       public          postgres    false    244            s           0    0 "   tbl_contact_address_detail__id_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public.tbl_contact_address_detail__id_seq OWNED BY public.tbl_contact_address_detail._id;
          public          postgres    false    245            �            1259    161280    tbl_contact_details    TABLE     �  CREATE TABLE public.tbl_contact_details (
    _id bigint NOT NULL,
    contact_type_id bigint,
    contact_code character varying(50),
    contact_name character varying(50),
    contact_no character varying(50),
    contact_person_name character varying(50),
    contact_email_id character varying(50),
    gstin_no character varying(50),
    _status integer DEFAULT 1,
    others character varying
);
 '   DROP TABLE public.tbl_contact_details;
       public         heap    postgres    false            �            1259    161287    tbl_contact_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_contact_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.tbl_contact_details__id_seq;
       public          postgres    false    246            t           0    0    tbl_contact_details__id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.tbl_contact_details__id_seq OWNED BY public.tbl_contact_details._id;
          public          postgres    false    247            �            1259    161289    tbl_contact_other_details    TABLE       CREATE TABLE public.tbl_contact_other_details (
    _id bigint NOT NULL,
    contact_id bigint,
    other_contact_person_name character varying(50),
    other_contact_no character varying(20),
    other_contact_emailid character varying(50),
    _status integer DEFAULT 1
);
 -   DROP TABLE public.tbl_contact_other_details;
       public         heap    postgres    false            �            1259    161293 !   tbl_contact_other_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_contact_other_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.tbl_contact_other_details__id_seq;
       public          postgres    false    248            u           0    0 !   tbl_contact_other_details__id_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.tbl_contact_other_details__id_seq OWNED BY public.tbl_contact_other_details._id;
          public          postgres    false    249            �            1259    161295    tbl_contact_type_mstr    TABLE     �   CREATE TABLE public.tbl_contact_type_mstr (
    _id integer NOT NULL,
    contact_type character varying(50),
    _status integer DEFAULT 1
);
 )   DROP TABLE public.tbl_contact_type_mstr;
       public         heap    postgres    false            �            1259    161299    tbl_contact_type_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_contact_type_mstr__id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.tbl_contact_type_mstr__id_seq;
       public          postgres    false    250            v           0    0    tbl_contact_type_mstr__id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.tbl_contact_type_mstr__id_seq OWNED BY public.tbl_contact_type_mstr._id;
          public          postgres    false    251            �            1259    161301    tbl_course_mstr    TABLE     �   CREATE TABLE public.tbl_course_mstr (
    _id bigint NOT NULL,
    course_name character varying,
    _status integer DEFAULT 1
);
 #   DROP TABLE public.tbl_course_mstr;
       public         heap    postgres    false            �            1259    161308    tbl_course_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_course_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.tbl_course_mstr__id_seq;
       public          postgres    false    252            w           0    0    tbl_course_mstr__id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.tbl_course_mstr__id_seq OWNED BY public.tbl_course_mstr._id;
          public          postgres    false    253            �            1259    161310    tbl_credit_note    TABLE     �  CREATE TABLE public.tbl_credit_note (
    credit_note_no character varying(50),
    invoice_no character varying(50),
    invoice_date date,
    payment_due_date date,
    sub_bill_amt numeric(18,2),
    cgst_total_tax numeric(18,2),
    sgst_total_tax numeric(18,2),
    igst_total_tax numeric(18,2),
    discount_amt numeric(18,2),
    bill_amt numeric(18,2),
    credit_note_date date,
    date_time timestamp without time zone,
    user_id bigint,
    _status integer DEFAULT 1,
    _id integer NOT NULL
);
 #   DROP TABLE public.tbl_credit_note;
       public         heap    postgres    false            �            1259    161314    tbl_credit_note__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_credit_note__id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.tbl_credit_note__id_seq;
       public          postgres    false    254            x           0    0    tbl_credit_note__id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.tbl_credit_note__id_seq OWNED BY public.tbl_credit_note._id;
          public          postgres    false    255                        1259    161316    tbl_creditnote_details    TABLE     �  CREATE TABLE public.tbl_creditnote_details (
    creditnote_id bigint,
    _id integer NOT NULL,
    item_mstr_id bigint,
    sub_item_mstr_id bigint,
    item_quantity numeric,
    item_per_rate numeric,
    total_amt numeric,
    cgst_tax_per numeric,
    sgst_tax_per numeric,
    igst_tax_per numeric,
    cgst_tax_amt numeric,
    sgst_tax_amt numeric,
    igst_tax_amt numeric,
    total_tax_amt numeric,
    sub_item_description character varying(255),
    _status integer DEFAULT 1
);
 *   DROP TABLE public.tbl_creditnote_details;
       public         heap    postgres    false                       1259    161323    tbl_creditnote_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_creditnote_details__id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public.tbl_creditnote_details__id_seq;
       public          postgres    false    256            y           0    0    tbl_creditnote_details__id_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public.tbl_creditnote_details__id_seq OWNED BY public.tbl_creditnote_details._id;
          public          postgres    false    257                       1259    161325    tbl_deduction_mstr    TABLE       CREATE TABLE public.tbl_deduction_mstr (
    _id integer NOT NULL,
    provident_fund numeric(9,2) NOT NULL,
    esic numeric(9,2) NOT NULL,
    professional_tax numeric(9,2) NOT NULL,
    tds numeric(9,2) NOT NULL,
    _status integer DEFAULT 1,
    employment_type_id integer
);
 &   DROP TABLE public.tbl_deduction_mstr;
       public         heap    postgres    false                       1259    161329    tbl_deduction_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_deduction_mstr__id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.tbl_deduction_mstr__id_seq;
       public          postgres    false    258            z           0    0    tbl_deduction_mstr__id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.tbl_deduction_mstr__id_seq OWNED BY public.tbl_deduction_mstr._id;
          public          postgres    false    259                       1259    161331    tbl_department_mstr    TABLE     �   CREATE TABLE public.tbl_department_mstr (
    _id bigint NOT NULL,
    dept_name character varying(100) DEFAULT NULL::character varying,
    _status integer DEFAULT 1
);
 '   DROP TABLE public.tbl_department_mstr;
       public         heap    postgres    false                       1259    161336    tbl_department_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_department_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.tbl_department_mstr__id_seq;
       public          postgres    false    260            {           0    0    tbl_department_mstr__id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.tbl_department_mstr__id_seq OWNED BY public.tbl_department_mstr._id;
          public          postgres    false    261                       1259    161338    tbl_designation_mstr    TABLE     �   CREATE TABLE public.tbl_designation_mstr (
    _id bigint NOT NULL,
    department_mstr_id bigint,
    grade_mstr_id bigint,
    designation_name character varying(100) DEFAULT NULL::character varying,
    _status integer DEFAULT 1
);
 (   DROP TABLE public.tbl_designation_mstr;
       public         heap    postgres    false                       1259    161343    tbl_designation_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_designation_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.tbl_designation_mstr__id_seq;
       public          postgres    false    262            |           0    0    tbl_designation_mstr__id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.tbl_designation_mstr__id_seq OWNED BY public.tbl_designation_mstr._id;
          public          postgres    false    263                       1259    161345    tbl_doc_type_mstr    TABLE     �   CREATE TABLE public.tbl_doc_type_mstr (
    _id bigint NOT NULL,
    doc_name character varying(200) DEFAULT NULL::character varying,
    _status integer DEFAULT 1
);
 %   DROP TABLE public.tbl_doc_type_mstr;
       public         heap    postgres    false            	           1259    161350    tbl_doc_type_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_doc_type_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.tbl_doc_type_mstr__id_seq;
       public          postgres    false    264            }           0    0    tbl_doc_type_mstr__id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.tbl_doc_type_mstr__id_seq OWNED BY public.tbl_doc_type_mstr._id;
          public          postgres    false    265            
           1259    161352    tbl_earning_mstr    TABLE     �  CREATE TABLE public.tbl_earning_mstr (
    _id integer NOT NULL,
    employment_type_id integer,
    dearness_allowance numeric,
    transport_allowance numeric,
    house_rent_allowance numeric,
    medical_reimbursement numeric,
    min_salary numeric,
    max_salary numeric,
    grade_id bigint,
    esic numeric,
    epf numeric,
    other numeric,
    work_type character varying,
    _status integer DEFAULT 1
);
 $   DROP TABLE public.tbl_earning_mstr;
       public         heap    postgres    false                       1259    161359    tbl_earning_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_earning_mstr__id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.tbl_earning_mstr__id_seq;
       public          postgres    false    266            ~           0    0    tbl_earning_mstr__id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.tbl_earning_mstr__id_seq OWNED BY public.tbl_earning_mstr._id;
          public          postgres    false    267                       1259    161361    tbl_emp_bank_details    TABLE     W  CREATE TABLE public.tbl_emp_bank_details (
    _id bigint NOT NULL,
    emp_details_id bigint,
    bank_name character varying(50) DEFAULT NULL::character varying,
    branch_name character varying(50) DEFAULT NULL::character varying,
    account_no character varying(50) DEFAULT NULL::character varying,
    confirm_account_no character varying(50) DEFAULT NULL::character varying,
    acc_holder_name character varying(255) DEFAULT NULL::character varying,
    ifsc_code character varying(20) DEFAULT NULL::character varying,
    default_status integer DEFAULT 0,
    _status integer DEFAULT 1
);
 (   DROP TABLE public.tbl_emp_bank_details;
       public         heap    postgres    false                       1259    161372    tbl_emp_bank_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_emp_bank_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.tbl_emp_bank_details__id_seq;
       public          postgres    false    268                       0    0    tbl_emp_bank_details__id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.tbl_emp_bank_details__id_seq OWNED BY public.tbl_emp_bank_details._id;
          public          postgres    false    269                       1259    161374    tbl_emp_details    TABLE       CREATE TABLE public.tbl_emp_details (
    _id bigint NOT NULL,
    department_mstr_id bigint,
    designation_mstr_id bigint,
    employment_type_mstr_id bigint,
    user_mstr_id bigint,
    employee_code character varying(50) DEFAULT NULL::character varying,
    biometric_employee_code character varying(50) DEFAULT NULL::character varying,
    first_name character varying(50) DEFAULT NULL::character varying,
    middle_name character varying(50) DEFAULT NULL::character varying,
    last_name character varying(50) DEFAULT NULL::character varying,
    present_address character varying(255) DEFAULT NULL::character varying,
    present_city character varying(100) DEFAULT NULL::character varying,
    present_district character varying(100) DEFAULT NULL::character varying,
    present_state character varying(100) DEFAULT NULL::character varying,
    present_pin_code character varying(100) DEFAULT NULL::character varying,
    permanent_address character varying(255) DEFAULT NULL::character varying,
    permanent_city character varying(100) DEFAULT NULL::character varying,
    permanent_district character varying(100) DEFAULT NULL::character varying,
    permanent_state character varying(100) DEFAULT NULL::character varying,
    permanent_pin_code character varying(100) DEFAULT NULL::character varying,
    d_o_b date,
    gender character varying(10) DEFAULT NULL::character varying,
    marital_status character varying(15) DEFAULT NULL::character varying,
    spouse_name character varying(150) DEFAULT NULL::character varying,
    height character varying(150) DEFAULT NULL::character varying,
    weight character varying(150) DEFAULT NULL::character varying,
    blood_group character varying(10) DEFAULT NULL::character varying,
    personal_phone_no character varying(15) DEFAULT NULL::character varying,
    other_phone_no character varying(15) DEFAULT NULL::character varying,
    email_id character varying(35) DEFAULT NULL::character varying,
    photo_path character varying(100) DEFAULT NULL::character varying,
    joining_date date,
    provident_fund_no character varying(50) DEFAULT NULL::character varying,
    employee_state_insurance_no character varying(50) DEFAULT NULL::character varying,
    experience_overall_relevant text,
    mentioned_any_special_information text,
    languages_know character varying(255) DEFAULT NULL::character varying,
    leisure_activity text,
    relations_working_in_this_company text,
    your_state_of_health text,
    services_agreement boolean,
    are_you_willing_to_be_posted_anywhere_in_india boolean,
    have_you_applied_before_in_this_company boolean,
    candidate_details_id bigint,
    offer_latter_path character varying(255) DEFAULT NULL::character varying,
    offer_latter_given_timestamp timestamp without time zone,
    created_by_emp_details_id bigint,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    step_status integer DEFAULT 0,
    _status integer DEFAULT 1,
    monthly_salary numeric(18,2) DEFAULT NULL::numeric,
    work_type character varying(25) DEFAULT NULL::character varying,
    grade_mstr_id bigint,
    company_location_id bigint,
    project_mstr_id bigint,
    project_concept_type character varying(20) DEFAULT NULL::character varying,
    project_visibility character varying(255)
);
 #   DROP TABLE public.tbl_emp_details;
       public         heap    postgres    false                       1259    161414    tbl_emp_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_emp_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.tbl_emp_details__id_seq;
       public          postgres    false    270            �           0    0    tbl_emp_details__id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.tbl_emp_details__id_seq OWNED BY public.tbl_emp_details._id;
          public          postgres    false    271                       1259    161416    tbl_emp_document_details    TABLE     C  CREATE TABLE public.tbl_emp_document_details (
    _id bigint NOT NULL,
    emp_details_id bigint,
    doc_type_mstr_id bigint,
    other_doc_name character varying(100) DEFAULT NULL::character varying,
    doc_no character varying(50) DEFAULT NULL::character varying,
    date_of_issue date,
    place_of_issue character varying(100) DEFAULT NULL::character varying,
    valid_upto date,
    doc_path character varying(150) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1
);
 ,   DROP TABLE public.tbl_emp_document_details;
       public         heap    postgres    false                       1259    161424     tbl_emp_document_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_emp_document_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.tbl_emp_document_details__id_seq;
       public          postgres    false    272            �           0    0     tbl_emp_document_details__id_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public.tbl_emp_document_details__id_seq OWNED BY public.tbl_emp_document_details._id;
          public          postgres    false    273                       1259    161426    tbl_emp_family_backbgound    TABLE     �  CREATE TABLE public.tbl_emp_family_backbgound (
    _id bigint NOT NULL,
    emp_details_id bigint,
    father_name character varying(150) DEFAULT NULL::character varying,
    father_occupation character varying(150) DEFAULT NULL::character varying,
    father_contact_no character varying(150) DEFAULT NULL::character varying,
    father_address character varying(150) DEFAULT NULL::character varying,
    mother_name character varying(150) DEFAULT NULL::character varying,
    mother_occupation character varying(150) DEFAULT NULL::character varying,
    mother_contact_no character varying(150) DEFAULT NULL::character varying,
    mother_address character varying(150) DEFAULT NULL::character varying,
    brother_name character varying(150) DEFAULT NULL::character varying,
    brother_occupation character varying(150) DEFAULT NULL::character varying,
    brother_contact_no character varying(150) DEFAULT NULL::character varying,
    brother_address character varying(150) DEFAULT NULL::character varying,
    sister_name character varying(150) DEFAULT NULL::character varying,
    sister_occupation character varying(150) DEFAULT NULL::character varying,
    sister_contact_no character varying(150) DEFAULT NULL::character varying,
    sister_address character varying(150) DEFAULT NULL::character varying,
    brother_in_law_name character varying(150) DEFAULT NULL::character varying,
    brother_in_law_occupation character varying(150) DEFAULT NULL::character varying,
    brother_in_law_contact_no character varying(150) DEFAULT NULL::character varying,
    brother_in_law_address character varying(150) DEFAULT NULL::character varying,
    spouse_name character varying(150) DEFAULT NULL::character varying,
    spouse_occupation character varying(150) DEFAULT NULL::character varying,
    spouse_contact_no character varying(150) DEFAULT NULL::character varying,
    spouse_address character varying(150) DEFAULT NULL::character varying,
    friend1_name character varying(150) DEFAULT NULL::character varying,
    friend1_occupation character varying(150) DEFAULT NULL::character varying,
    friend1_contact_no character varying(150) DEFAULT NULL::character varying,
    friend1_address character varying(150) DEFAULT NULL::character varying,
    friend2_name character varying(150) DEFAULT NULL::character varying,
    friend2_occupation character varying(150) DEFAULT NULL::character varying,
    friend2_contact_no character varying(150) DEFAULT NULL::character varying,
    friend2_address character varying(150) DEFAULT NULL::character varying,
    relative1_name character varying(150) DEFAULT NULL::character varying,
    relative1_occupation character varying(150) DEFAULT NULL::character varying,
    relative1_contact_no character varying(150) DEFAULT NULL::character varying,
    relative1_address character varying(150) DEFAULT NULL::character varying,
    relative2_name character varying(150) DEFAULT NULL::character varying,
    relative2_occupation character varying(150) DEFAULT NULL::character varying,
    relative2_contact_no character varying(150) DEFAULT NULL::character varying,
    relative2_address character varying(150) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1
);
 -   DROP TABLE public.tbl_emp_family_backbgound;
       public         heap    postgres    false                       1259    161473 !   tbl_emp_family_backbgound__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_emp_family_backbgound__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.tbl_emp_family_backbgound__id_seq;
       public          postgres    false    274            �           0    0 !   tbl_emp_family_backbgound__id_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.tbl_emp_family_backbgound__id_seq OWNED BY public.tbl_emp_family_backbgound._id;
          public          postgres    false    275                       1259    161475    tbl_emp_present_employment    TABLE       CREATE TABLE public.tbl_emp_present_employment (
    _id bigint NOT NULL,
    emp_details_id bigint,
    present_name_of_employer character varying(255) DEFAULT NULL::character varying,
    present_address_of_organisation character varying(255) DEFAULT NULL::character varying,
    present_date_of_joining date,
    present_brief_desc_of_present_job text,
    present_basic_salary numeric(18,2) DEFAULT NULL::numeric,
    present_hra numeric(18,2) DEFAULT NULL::numeric,
    present_total_monthly_amt numeric(18,2) DEFAULT NULL::numeric,
    present_other_emoluments_pf_lta_medical character varying(255) DEFAULT NULL::character varying,
    present_any_benefits_facilities character varying(255) DEFAULT NULL::character varying,
    present_expected_salary_pf_contribution_bonus character varying(255) DEFAULT NULL::character varying,
    present_join_notice_period character varying(255) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1
);
 .   DROP TABLE public.tbl_emp_present_employment;
       public         heap    postgres    false                       1259    161491 "   tbl_emp_present_employment__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_emp_present_employment__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public.tbl_emp_present_employment__id_seq;
       public          postgres    false    276            �           0    0 "   tbl_emp_present_employment__id_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public.tbl_emp_present_employment__id_seq OWNED BY public.tbl_emp_present_employment._id;
          public          postgres    false    277                       1259    161493 #   tbl_emp_previous_employment_details    TABLE     �  CREATE TABLE public.tbl_emp_previous_employment_details (
    _id bigint NOT NULL,
    emp_details_id bigint,
    previous_period_from date,
    previous_period_to date,
    previous_experience character varying(50) DEFAULT NULL::character varying,
    previous_organization_name_address character varying(255) DEFAULT NULL::character varying,
    previous_designation character varying(255) DEFAULT NULL::character varying,
    previous_monthly_emoluments numeric(18,2) DEFAULT NULL::numeric,
    previous_brief_job_description text,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1
);
 7   DROP TABLE public.tbl_emp_previous_employment_details;
       public         heap    postgres    false                       1259    161504 +   tbl_emp_previous_employment_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_emp_previous_employment_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 B   DROP SEQUENCE public.tbl_emp_previous_employment_details__id_seq;
       public          postgres    false    278            �           0    0 +   tbl_emp_previous_employment_details__id_seq    SEQUENCE OWNED BY     {   ALTER SEQUENCE public.tbl_emp_previous_employment_details__id_seq OWNED BY public.tbl_emp_previous_employment_details._id;
          public          postgres    false    279                       1259    161506    tbl_emp_qualification_details    TABLE     �  CREATE TABLE public.tbl_emp_qualification_details (
    _id bigint NOT NULL,
    emp_details_id bigint,
    course_mstr_id bigint,
    other_course character varying(100) DEFAULT NULL::character varying,
    course_specialization character varying(100) DEFAULT NULL::character varying,
    medium_type character varying(50) DEFAULT NULL::character varying,
    passing_year character varying(10) DEFAULT NULL::character varying,
    school_college_institute_name character varying(250) DEFAULT NULL::character varying,
    board_university_name character varying(150) DEFAULT NULL::character varying,
    marks_percent character varying(10) DEFAULT NULL::character varying,
    attachment_doc_path character varying(150) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1,
    sub_course_mstr_id bigint,
    sub_stream_mstr_id bigint
);
 1   DROP TABLE public.tbl_emp_qualification_details;
       public         heap    postgres    false                       1259    161521 %   tbl_emp_qualification_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_emp_qualification_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 <   DROP SEQUENCE public.tbl_emp_qualification_details__id_seq;
       public          postgres    false    280            �           0    0 %   tbl_emp_qualification_details__id_seq    SEQUENCE OWNED BY     o   ALTER SEQUENCE public.tbl_emp_qualification_details__id_seq OWNED BY public.tbl_emp_qualification_details._id;
          public          postgres    false    281                       1259    161523    tbl_emp_references    TABLE     n  CREATE TABLE public.tbl_emp_references (
    _id bigint NOT NULL,
    emp_details_id bigint,
    reference_name_designation_organisation1 text,
    reference_phone_no_email_id1 character varying(60) DEFAULT NULL::character varying,
    reference_address_of_communication1 character varying(255) DEFAULT NULL::character varying,
    reference_social_professinal1 character varying(50) DEFAULT NULL::character varying,
    reference_name_designation_organisation2 text,
    reference_phone_no_email_id2 character varying(60) DEFAULT NULL::character varying,
    reference_address_of_communication2 character varying(255) DEFAULT NULL::character varying,
    reference_social_professinal2 character varying(50) DEFAULT NULL::character varying,
    reference_name_designation_organisation3 text,
    reference_phone_no_email_id3 character varying(60) DEFAULT NULL::character varying,
    reference_address_of_communication3 character varying(255) DEFAULT NULL::character varying,
    reference_social_professinal3 character varying(50) DEFAULT NULL::character varying,
    reference_name_designation_organisation4 text,
    reference_phone_no_email_id4 character varying(60) DEFAULT NULL::character varying,
    reference_address_of_communication4 character varying(255) DEFAULT NULL::character varying,
    reference_social_professinal4 character varying(50) DEFAULT NULL::character varying,
    reference_name_designation_organisation5 text,
    reference_phone_no_email_id5 character varying(60) DEFAULT NULL::character varying,
    reference_address_of_communication5 character varying(255) DEFAULT NULL::character varying,
    reference_social_professinal5 character varying(50) DEFAULT NULL::character varying,
    reference_name_designation_organisation6 text,
    reference_phone_no_email_id6 character varying(60) DEFAULT NULL::character varying,
    reference_address_of_communication6 character varying(255) DEFAULT NULL::character varying,
    reference_social_professinal6 character varying(50) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1
);
 &   DROP TABLE public.tbl_emp_references;
       public         heap    postgres    false                       1259    161548    tbl_emp_references__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_emp_references__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.tbl_emp_references__id_seq;
       public          postgres    false    282            �           0    0    tbl_emp_references__id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.tbl_emp_references__id_seq OWNED BY public.tbl_emp_references._id;
          public          postgres    false    283                       1259    161550    tbl_employee_leave_detail    TABLE     �  CREATE TABLE public.tbl_employee_leave_detail (
    _id bigint NOT NULL,
    employee_id bigint,
    leave_from_date date,
    leave_to_date date,
    leave_type_id bigint,
    leave_reason text,
    financial_year character varying(20) DEFAULT NULL::character varying,
    leave_request_datetime timestamp without time zone,
    _status integer DEFAULT 1,
    old_leave_type_id bigint,
    approve_reject_reason text,
    leave_days integer,
    old_leave_days integer,
    paid_leave integer,
    cancel_remarks text,
    reporting_head_emp_id bigint,
    approve_reject_cancel_remarks text,
    old_leave_from_date date,
    old_leave_to_date date,
    reporting_tl_emp_id bigint,
    reporting_head_leave_type_id bigint,
    hr_remarks text
);
 -   DROP TABLE public.tbl_employee_leave_detail;
       public         heap    postgres    false                       1259    161558 !   tbl_employee_leave_detail__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_employee_leave_detail__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.tbl_employee_leave_detail__id_seq;
       public          postgres    false    284            �           0    0 !   tbl_employee_leave_detail__id_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.tbl_employee_leave_detail__id_seq OWNED BY public.tbl_employee_leave_detail._id;
          public          postgres    false    285                       1259    161560    tbl_employee_quit_details    TABLE     x  CREATE TABLE public.tbl_employee_quit_details (
    _id bigint NOT NULL,
    employee_id bigint,
    terminate_resign_reason text,
    asset_submission_date date,
    resign_terminate_type character varying(20),
    request_datetime timestamp without time zone,
    created_by bigint,
    old_notice_period character varying(20),
    _status integer DEFAULT 1,
    reject_resign_reason character varying(255),
    accept_reject_datetime timestamp(6) without time zone,
    notice_period date,
    final_settlment_date date,
    create_experience_letter character varying(255),
    upload_experience_letter character varying(255)
);
 -   DROP TABLE public.tbl_employee_quit_details;
       public         heap    postgres    false                       1259    161567 !   tbl_employee_quit_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_employee_quit_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.tbl_employee_quit_details__id_seq;
       public          postgres    false    286            �           0    0 !   tbl_employee_quit_details__id_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.tbl_employee_quit_details__id_seq OWNED BY public.tbl_employee_quit_details._id;
          public          postgres    false    287                        1259    161569    tbl_employment_type_mstr    TABLE     �   CREATE TABLE public.tbl_employment_type_mstr (
    _id bigint NOT NULL,
    employment_type character varying(255) DEFAULT NULL::character varying,
    _status integer DEFAULT 1
);
 ,   DROP TABLE public.tbl_employment_type_mstr;
       public         heap    postgres    false            !           1259    161574     tbl_employment_type_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_employment_type_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.tbl_employment_type_mstr__id_seq;
       public          postgres    false    288            �           0    0     tbl_employment_type_mstr__id_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public.tbl_employment_type_mstr__id_seq OWNED BY public.tbl_employment_type_mstr._id;
          public          postgres    false    289            "           1259    161576    tbl_estimate    TABLE       CREATE TABLE public.tbl_estimate (
    _id bigint NOT NULL,
    contact_details_id bigint,
    ship_from_state character varying,
    bill_to_state character varying,
    ship_to_state character varying,
    estimate_no character varying(100),
    estimate_date date,
    estimate_expiry_date date,
    sub_bill_amt numeric(18,2),
    cgst_total_tax numeric(18,2),
    sgst_total_tax numeric(18,2),
    igst_total_tax numeric(18,2),
    sub_tax_bill_amt numeric(18,2),
    discount_type character varying(15),
    discount_rate numeric(18,2),
    discount_amt numeric(18,2),
    bill_amt numeric(18,2),
    customer_notes text,
    terms_and_conditions text,
    datetime timestamp without time zone,
    user_id bigint,
    ip_address character varying(55),
    work_order_status integer DEFAULT 0,
    work_order_received_date date,
    work_order_attach_path character varying(255),
    work_order_remarks text,
    work_order_entry_datetime timestamp without time zone,
    work_order_entry_by bigint,
    _status integer DEFAULT 1
);
     DROP TABLE public.tbl_estimate;
       public         heap    postgres    false            #           1259    161584    tbl_estimate__id_seq    SEQUENCE     }   CREATE SEQUENCE public.tbl_estimate__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.tbl_estimate__id_seq;
       public          postgres    false    290            �           0    0    tbl_estimate__id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.tbl_estimate__id_seq OWNED BY public.tbl_estimate._id;
          public          postgres    false    291            $           1259    161586    tbl_estimate_details    TABLE     w  CREATE TABLE public.tbl_estimate_details (
    _id bigint NOT NULL,
    estimate_id bigint,
    asset_type character varying(20),
    item_mstr_id bigint,
    sub_item_mstr_id bigint,
    item_quantity character varying(100),
    item_per_rate numeric(18,2),
    total_amt numeric(18,2),
    cgst_tax_per numeric(18,2),
    sgst_tax_per numeric(18,2),
    igst_tax_per numeric(18,2),
    cgst_tax_amt numeric(18,2),
    sgst_tax_amt numeric(18,2),
    igst_tax_amt numeric(18,2),
    total_tax_amt numeric(18,2),
    grande_total_amt numeric(18,2),
    sub_item_description character varying(255),
    _status integer DEFAULT 1
);
 (   DROP TABLE public.tbl_estimate_details;
       public         heap    postgres    false            %           1259    161590    tbl_estimate_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_estimate_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.tbl_estimate_details__id_seq;
       public          postgres    false    292            �           0    0    tbl_estimate_details__id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.tbl_estimate_details__id_seq OWNED BY public.tbl_estimate_details._id;
          public          postgres    false    293            &           1259    161592    tbl_floor_mstr    TABLE     �   CREATE TABLE public.tbl_floor_mstr (
    _id bigint NOT NULL,
    floor_name character varying(150) NOT NULL,
    _status integer DEFAULT 1
);
 "   DROP TABLE public.tbl_floor_mstr;
       public         heap    postgres    false            '           1259    161596    tbl_floor_mstr__id_seq    SEQUENCE        CREATE SEQUENCE public.tbl_floor_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.tbl_floor_mstr__id_seq;
       public          postgres    false    294            �           0    0    tbl_floor_mstr__id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.tbl_floor_mstr__id_seq OWNED BY public.tbl_floor_mstr._id;
          public          postgres    false    295            (           1259    161598    tbl_generate_salary_details    TABLE       CREATE TABLE public.tbl_generate_salary_details (
    _id bigint NOT NULL,
    employee_id bigint,
    month_year character varying(20) DEFAULT NULL::character varying,
    financial_year character varying(20) DEFAULT NULL::character varying,
    working_days character varying(10) DEFAULT NULL::character varying,
    present_days character varying(10) DEFAULT NULL::character varying,
    paid_leave character varying(10) DEFAULT NULL::character varying,
    basic_salary numeric(10,2) DEFAULT NULL::numeric,
    da_percent numeric(10,2) DEFAULT NULL::numeric,
    ta_percent numeric(10,2) DEFAULT NULL::numeric,
    hra_percent numeric(10,2) DEFAULT NULL::numeric,
    mr_percent numeric(10,2) DEFAULT NULL::numeric,
    epf_percent numeric(10,2) DEFAULT NULL::numeric,
    esic_percent numeric(10,2) DEFAULT NULL::numeric,
    other_tax_percent numeric(10,2) DEFAULT NULL::numeric,
    prepared_salary numeric(10,2) DEFAULT NULL::numeric,
    final_prepared_salary numeric(10,2) DEFAULT NULL::numeric,
    employment_type_id bigint,
    created_by bigint,
    created_on timestamp without time zone,
    _status integer DEFAULT 1,
    work_type character varying(20),
    attended_hours character varying(10),
    salary_slip_no character varying(50),
    incentive_amt numeric(10,2)
);
 /   DROP TABLE public.tbl_generate_salary_details;
       public         heap    postgres    false            )           1259    161617 #   tbl_generate_salary_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_generate_salary_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 :   DROP SEQUENCE public.tbl_generate_salary_details__id_seq;
       public          postgres    false    296            �           0    0 #   tbl_generate_salary_details__id_seq    SEQUENCE OWNED BY     k   ALTER SEQUENCE public.tbl_generate_salary_details__id_seq OWNED BY public.tbl_generate_salary_details._id;
          public          postgres    false    297            *           1259    161619    tbl_grade_mstr    TABLE     �   CREATE TABLE public.tbl_grade_mstr (
    _id bigint NOT NULL,
    grade_type character varying(100) DEFAULT NULL::character varying,
    _status integer DEFAULT 1,
    min_salary numeric,
    max_salary numeric
);
 "   DROP TABLE public.tbl_grade_mstr;
       public         heap    postgres    false            +           1259    161627    tbl_grade_mstr__id_seq    SEQUENCE        CREATE SEQUENCE public.tbl_grade_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.tbl_grade_mstr__id_seq;
       public          postgres    false    298            �           0    0    tbl_grade_mstr__id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.tbl_grade_mstr__id_seq OWNED BY public.tbl_grade_mstr._id;
          public          postgres    false    299            ,           1259    161629    tbl_interview_details    TABLE     �  CREATE TABLE public.tbl_interview_details (
    _id bigint NOT NULL,
    project_name_id bigint,
    post_name_id bigint,
    interview_location_id bigint,
    interview_start_date date,
    interview_end_date date,
    interview_start_time character varying(10) DEFAULT NULL::character varying,
    interview_end_time character varying(10) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    created_by bigint,
    _status integer DEFAULT 1,
    job_post_detail_id bigint
);
 )   DROP TABLE public.tbl_interview_details;
       public         heap    postgres    false            -           1259    161635    tbl_interview_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_interview_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.tbl_interview_details__id_seq;
       public          postgres    false    300            �           0    0    tbl_interview_details__id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.tbl_interview_details__id_seq OWNED BY public.tbl_interview_details._id;
          public          postgres    false    301            .           1259    161637 !   tbl_interview_interviewer_details    TABLE     �   CREATE TABLE public.tbl_interview_interviewer_details (
    _id bigint NOT NULL,
    interview_details_id bigint,
    interview_round_id bigint,
    interviewer_id bigint,
    _status integer DEFAULT 1
);
 5   DROP TABLE public.tbl_interview_interviewer_details;
       public         heap    postgres    false            /           1259    161641 )   tbl_interview_interviewer_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_interview_interviewer_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 @   DROP SEQUENCE public.tbl_interview_interviewer_details__id_seq;
       public          postgres    false    302            �           0    0 )   tbl_interview_interviewer_details__id_seq    SEQUENCE OWNED BY     w   ALTER SEQUENCE public.tbl_interview_interviewer_details__id_seq OWNED BY public.tbl_interview_interviewer_details._id;
          public          postgres    false    303            0           1259    161643 %   tbl_interview_job_description_details    TABLE     �   CREATE TABLE public.tbl_interview_job_description_details (
    _id bigint NOT NULL,
    interview_call_id bigint,
    job_description bigint,
    _status integer DEFAULT 1
);
 9   DROP TABLE public.tbl_interview_job_description_details;
       public         heap    postgres    false            1           1259    161647 -   tbl_interview_job_description_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_interview_job_description_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 D   DROP SEQUENCE public.tbl_interview_job_description_details__id_seq;
       public          postgres    false    304            �           0    0 -   tbl_interview_job_description_details__id_seq    SEQUENCE OWNED BY        ALTER SEQUENCE public.tbl_interview_job_description_details__id_seq OWNED BY public.tbl_interview_job_description_details._id;
          public          postgres    false    305            2           1259    161649    tbl_interview_round_details    TABLE     %  CREATE TABLE public.tbl_interview_round_details (
    _id bigint NOT NULL,
    interview_details_id bigint,
    department_id bigint,
    designation_id bigint,
    description text,
    _status integer DEFAULT 1,
    round_name character varying,
    interview_type character varying(255)
);
 /   DROP TABLE public.tbl_interview_round_details;
       public         heap    postgres    false            3           1259    161656 #   tbl_interview_round_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_interview_round_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 :   DROP SEQUENCE public.tbl_interview_round_details__id_seq;
       public          postgres    false    306            �           0    0 #   tbl_interview_round_details__id_seq    SEQUENCE OWNED BY     k   ALTER SEQUENCE public.tbl_interview_round_details__id_seq OWNED BY public.tbl_interview_round_details._id;
          public          postgres    false    307            4           1259    161658    tbl_invoice    TABLE     �  CREATE TABLE public.tbl_invoice (
    _id bigint NOT NULL,
    contact_details_id bigint,
    ship_from_state character varying(50),
    bill_to_state character varying(50),
    ship_to_state character varying(50),
    invoice_no character varying(50),
    invoice_date date,
    payment_due_date date,
    sub_bill_amt numeric(18,2),
    cgst_total_tax numeric(18,2),
    sgst_total_tax numeric(18,2),
    igst_total_tax numeric(18,2),
    sub_tax_bill_amt numeric(18,2),
    discount_type character varying(15),
    discount_rate numeric(18,2),
    discount_amt numeric(18,2),
    bill_amt numeric(18,2),
    user_id bigint,
    ip_address character varying(100),
    paid_status integer DEFAULT 0,
    customer_note character varying(255),
    terms_and_conditions text,
    _status integer DEFAULT 1,
    datetime timestamp without time zone,
    invoice_cancel_date date,
    invoice_cancel_remarks character varying(255)
);
    DROP TABLE public.tbl_invoice;
       public         heap    postgres    false            5           1259    161666    tbl_invoice__id_seq    SEQUENCE     |   CREATE SEQUENCE public.tbl_invoice__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.tbl_invoice__id_seq;
       public          postgres    false    308            �           0    0    tbl_invoice__id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.tbl_invoice__id_seq OWNED BY public.tbl_invoice._id;
          public          postgres    false    309            6           1259    161668    tbl_invoice_details    TABLE     u  CREATE TABLE public.tbl_invoice_details (
    _id bigint NOT NULL,
    invoice_id bigint,
    asset_type character varying(20),
    item_mstr_id bigint,
    sub_item_mstr_id bigint,
    item_quantity character varying(100),
    item_per_rate numeric(18,2),
    total_amt numeric(18,2),
    cgst_tax_per numeric(18,2),
    sgst_tax_per numeric(18,2),
    igst_tax_per numeric(18,2),
    cgst_tax_amt numeric(18,2),
    sgst_tax_amt numeric(18,2),
    igst_tax_amt numeric(18,2),
    total_tax_amt numeric(18,2),
    grande_total_amt numeric(18,2),
    sub_item_description character varying(255),
    _status integer DEFAULT 1
);
 '   DROP TABLE public.tbl_invoice_details;
       public         heap    postgres    false            7           1259    161672    tbl_invoice_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_invoice_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.tbl_invoice_details__id_seq;
       public          postgres    false    310            �           0    0    tbl_invoice_details__id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.tbl_invoice_details__id_seq OWNED BY public.tbl_invoice_details._id;
          public          postgres    false    311            8           1259    161674    tbl_item_name_mstr    TABLE     �   CREATE TABLE public.tbl_item_name_mstr (
    _id bigint NOT NULL,
    asset_type character varying(30) DEFAULT NULL::character varying,
    item_name character varying(30) DEFAULT NULL::character varying,
    _status integer DEFAULT 1
);
 &   DROP TABLE public.tbl_item_name_mstr;
       public         heap    postgres    false            9           1259    161680    tbl_item_name_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_item_name_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.tbl_item_name_mstr__id_seq;
       public          postgres    false    312            �           0    0    tbl_item_name_mstr__id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.tbl_item_name_mstr__id_seq OWNED BY public.tbl_item_name_mstr._id;
          public          postgres    false    313            :           1259    161682    tbl_job_post_detail    TABLE     3  CREATE TABLE public.tbl_job_post_detail (
    _id bigint NOT NULL,
    designation_mstr_id bigint,
    job_description text,
    employment_type_mstr_id bigint,
    required_min_experience character varying(255) DEFAULT NULL::character varying,
    required_qualification character varying(255) DEFAULT NULL::character varying,
    key_skills character varying(255) DEFAULT NULL::character varying,
    no_of_opening character varying(255) DEFAULT NULL::character varying,
    entry_date date,
    expiry_date date,
    job_post_by_emp_detais_id bigint,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    _status integer DEFAULT 1,
    required_max_experience character varying(255) DEFAULT NULL::character varying,
    company_location_id bigint,
    project_name_id bigint
);
 '   DROP TABLE public.tbl_job_post_detail;
       public         heap    postgres    false            ;           1259    161694    tbl_job_post_detail__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_job_post_detail__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.tbl_job_post_detail__id_seq;
       public          postgres    false    314            �           0    0    tbl_job_post_detail__id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.tbl_job_post_detail__id_seq OWNED BY public.tbl_job_post_detail._id;
          public          postgres    false    315            <           1259    161696 "   tbl_job_post_qualification_details    TABLE     �   CREATE TABLE public.tbl_job_post_qualification_details (
    _id bigint NOT NULL,
    job_post_details_id bigint,
    course_mstr_id bigint,
    sub_course_mstr_id bigint,
    sub_stream_mstr_id bigint,
    _status integer DEFAULT 1
);
 6   DROP TABLE public.tbl_job_post_qualification_details;
       public         heap    postgres    false            =           1259    161700 *   tbl_job_post_qualification_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_job_post_qualification_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 A   DROP SEQUENCE public.tbl_job_post_qualification_details__id_seq;
       public          postgres    false    316            �           0    0 *   tbl_job_post_qualification_details__id_seq    SEQUENCE OWNED BY     y   ALTER SEQUENCE public.tbl_job_post_qualification_details__id_seq OWNED BY public.tbl_job_post_qualification_details._id;
          public          postgres    false    317            >           1259    161702 	   tbl_leave    TABLE     �   CREATE TABLE public.tbl_leave (
    _id integer NOT NULL,
    grade_id integer,
    from_date date,
    to_date date,
    day integer,
    leave_type_id integer,
    reason character varying,
    user_id integer,
    _status integer DEFAULT 1
);
    DROP TABLE public.tbl_leave;
       public         heap    postgres    false            ?           1259    161709    tbl_leave__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_leave__id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.tbl_leave__id_seq;
       public          postgres    false    318            �           0    0    tbl_leave__id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.tbl_leave__id_seq OWNED BY public.tbl_leave._id;
          public          postgres    false    319            @           1259    161711    tbl_leave_mstr    TABLE     �   CREATE TABLE public.tbl_leave_mstr (
    _id integer NOT NULL,
    leave_type_id integer,
    leave_days integer NOT NULL,
    grade_id integer,
    _status integer DEFAULT 1
);
 "   DROP TABLE public.tbl_leave_mstr;
       public         heap    postgres    false            A           1259    161715    tbl_leave_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_leave_mstr__id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.tbl_leave_mstr__id_seq;
       public          postgres    false    320            �           0    0    tbl_leave_mstr__id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.tbl_leave_mstr__id_seq OWNED BY public.tbl_leave_mstr._id;
          public          postgres    false    321            B           1259    161717    tbl_leave_type_mstr    TABLE     �   CREATE TABLE public.tbl_leave_type_mstr (
    _id integer NOT NULL,
    leave_type character varying NOT NULL,
    leave_days integer,
    _status integer DEFAULT 1
);
 '   DROP TABLE public.tbl_leave_type_mstr;
       public         heap    postgres    false            C           1259    161724    tbl_leave_type_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_leave_type_mstr__id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.tbl_leave_type_mstr__id_seq;
       public          postgres    false    322            �           0    0    tbl_leave_type_mstr__id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.tbl_leave_type_mstr__id_seq OWNED BY public.tbl_leave_type_mstr._id;
          public          postgres    false    323            D           1259    161726    tbl_login_details    TABLE     �  CREATE TABLE public.tbl_login_details (
    _id integer NOT NULL,
    emp_details_id bigint NOT NULL,
    device_type character varying(15) DEFAULT NULL::character varying,
    imei_no character varying(20) DEFAULT NULL::character varying,
    ip_address character varying(50) NOT NULL,
    _token character varying(20) NOT NULL,
    created_on timestamp without time zone,
    _status integer DEFAULT 1
);
 %   DROP TABLE public.tbl_login_details;
       public         heap    postgres    false            E           1259    161732    tbl_login_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_login_details__id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.tbl_login_details__id_seq;
       public          postgres    false    324            �           0    0    tbl_login_details__id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.tbl_login_details__id_seq OWNED BY public.tbl_login_details._id;
          public          postgres    false    325            F           1259    161734    tbl_menu_mstr    TABLE     1  CREATE TABLE public.tbl_menu_mstr (
    _id bigint NOT NULL,
    menu_name character varying(150) DEFAULT NULL::character varying,
    menu_path character varying(150) DEFAULT NULL::character varying,
    under_menu_mstr_id bigint DEFAULT 0,
    _order integer DEFAULT 0,
    _status integer DEFAULT 1
);
 !   DROP TABLE public.tbl_menu_mstr;
       public         heap    postgres    false            G           1259    161742    tbl_menu_permission    TABLE     �   CREATE TABLE public.tbl_menu_permission (
    _id bigint NOT NULL,
    menu_mstr_id bigint,
    designation_mstr_id bigint,
    _status integer DEFAULT 1
);
 '   DROP TABLE public.tbl_menu_permission;
       public         heap    postgres    false            H           1259    161746    tbl_menu_permission__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_menu_permission__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.tbl_menu_permission__id_seq;
       public          postgres    false    326            �           0    0    tbl_menu_permission__id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.tbl_menu_permission__id_seq OWNED BY public.tbl_menu_mstr._id;
          public          postgres    false    328            I           1259    161748    tbl_menu_permission__id_seq1    SEQUENCE     �   CREATE SEQUENCE public.tbl_menu_permission__id_seq1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.tbl_menu_permission__id_seq1;
       public          postgres    false    327            �           0    0    tbl_menu_permission__id_seq1    SEQUENCE OWNED BY     \   ALTER SEQUENCE public.tbl_menu_permission__id_seq1 OWNED BY public.tbl_menu_permission._id;
          public          postgres    false    329            J           1259    161750    tbl_notification_detail    TABLE       CREATE TABLE public.tbl_notification_detail (
    _id bigint NOT NULL,
    title character varying(100) DEFAULT NULL::character varying,
    about character varying(100) DEFAULT NULL::character varying,
    link character varying(100) DEFAULT NULL::character varying,
    department_mstr_id bigint,
    created_by bigint,
    created_on timestamp without time zone,
    _status integer DEFAULT 1,
    employee_id bigint,
    notification_type character varying(50),
    notification_reference_id bigint,
    designation_mstr_id bigint
);
 +   DROP TABLE public.tbl_notification_detail;
       public         heap    postgres    false            K           1259    161757    tbl_notification_detail__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_notification_detail__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.tbl_notification_detail__id_seq;
       public          postgres    false    330            �           0    0    tbl_notification_detail__id_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.tbl_notification_detail__id_seq OWNED BY public.tbl_notification_detail._id;
          public          postgres    false    331            L           1259    161759    tbl_on_reporting_leave_mstr    TABLE     L  CREATE TABLE public.tbl_on_reporting_leave_mstr (
    _id bigint NOT NULL,
    reporting_head_designation_mstr_id bigint,
    reporting_leave_designation_mstr_id bigint,
    reporting_person_designation_mstr_id bigint,
    _status integer DEFAULT 1,
    reporting_head_emp_mstr_id bigint,
    reporting_person_emp_mstr_id bigint
);
 /   DROP TABLE public.tbl_on_reporting_leave_mstr;
       public         heap    postgres    false            M           1259    161763 #   tbl_on_reporting_leave_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_on_reporting_leave_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 :   DROP SEQUENCE public.tbl_on_reporting_leave_mstr__id_seq;
       public          postgres    false    332            �           0    0 #   tbl_on_reporting_leave_mstr__id_seq    SEQUENCE OWNED BY     k   ALTER SEQUENCE public.tbl_on_reporting_leave_mstr__id_seq OWNED BY public.tbl_on_reporting_leave_mstr._id;
          public          postgres    false    333            N           1259    161765    tbl_payment_mode_mstr    TABLE     �   CREATE TABLE public.tbl_payment_mode_mstr (
    _id bigint NOT NULL,
    payment_mode character varying(30) DEFAULT NULL::character varying,
    _status integer DEFAULT 1
);
 )   DROP TABLE public.tbl_payment_mode_mstr;
       public         heap    postgres    false            O           1259    161770    tbl_payment_mode_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_payment_mode_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.tbl_payment_mode_mstr__id_seq;
       public          postgres    false    334            �           0    0    tbl_payment_mode_mstr__id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.tbl_payment_mode_mstr__id_seq OWNED BY public.tbl_payment_mode_mstr._id;
          public          postgres    false    335            P           1259    161772    tbl_project_mstr    TABLE     B  CREATE TABLE public.tbl_project_mstr (
    _id bigint NOT NULL,
    project_name character varying(50) DEFAULT NULL::character varying,
    project_short_name character varying(30) DEFAULT NULL::character varying,
    project_description character varying(255) DEFAULT NULL::character varying,
    latitude character varying(100) DEFAULT NULL::character varying,
    longitude character varying(100) DEFAULT NULL::character varying,
    project_location character varying,
    _status integer DEFAULT 1,
    concept_type character varying(20) DEFAULT NULL::character varying
);
 $   DROP TABLE public.tbl_project_mstr;
       public         heap    postgres    false            Q           1259    161785    tbl_project_mstr_address    TABLE     �   CREATE TABLE public.tbl_project_mstr_address (
    _id bigint NOT NULL,
    project_mstr_id bigint,
    _status integer DEFAULT 1,
    state_dist_city_id bigint
);
 ,   DROP TABLE public.tbl_project_mstr_address;
       public         heap    postgres    false            R           1259    161789 !   tbl_project_mstr__address__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_project_mstr__address__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.tbl_project_mstr__address__id_seq;
       public          postgres    false    337            �           0    0 !   tbl_project_mstr__address__id_seq    SEQUENCE OWNED BY     f   ALTER SEQUENCE public.tbl_project_mstr__address__id_seq OWNED BY public.tbl_project_mstr_address._id;
          public          postgres    false    338            S           1259    161791    tbl_project_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_project_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.tbl_project_mstr__id_seq;
       public          postgres    false    336            �           0    0    tbl_project_mstr__id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.tbl_project_mstr__id_seq OWNED BY public.tbl_project_mstr._id;
          public          postgres    false    339            T           1259    161793     tbl_project_ward_permission_mstr    TABLE     �   CREATE TABLE public.tbl_project_ward_permission_mstr (
    _id bigint NOT NULL,
    emp_details_id bigint,
    project_mstr_address_id bigint,
    ward_mstr_id bigint,
    _status integer DEFAULT 1
);
 4   DROP TABLE public.tbl_project_ward_permission_mstr;
       public         heap    postgres    false            U           1259    161797 (   tbl_project_ward_permission_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_project_ward_permission_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ?   DROP SEQUENCE public.tbl_project_ward_permission_mstr__id_seq;
       public          postgres    false    340            �           0    0 (   tbl_project_ward_permission_mstr__id_seq    SEQUENCE OWNED BY     u   ALTER SEQUENCE public.tbl_project_ward_permission_mstr__id_seq OWNED BY public.tbl_project_ward_permission_mstr._id;
          public          postgres    false    341            V           1259    161799    tbl_relation_mstr    TABLE     �   CREATE TABLE public.tbl_relation_mstr (
    _id bigint NOT NULL,
    course_name character varying(200) DEFAULT NULL::character varying,
    _status integer DEFAULT 1
);
 %   DROP TABLE public.tbl_relation_mstr;
       public         heap    postgres    false            W           1259    161804    tbl_relation_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_relation_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.tbl_relation_mstr__id_seq;
       public          postgres    false    342            �           0    0    tbl_relation_mstr__id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.tbl_relation_mstr__id_seq OWNED BY public.tbl_relation_mstr._id;
          public          postgres    false    343            X           1259    161806    tbl_state_dist_city    TABLE       CREATE TABLE public.tbl_state_dist_city (
    _id bigint NOT NULL,
    state character varying(50) DEFAULT NULL::character varying,
    dist character varying(150) DEFAULT NULL::character varying,
    city character varying(150) DEFAULT NULL::character varying
);
 '   DROP TABLE public.tbl_state_dist_city;
       public         heap    postgres    false            Y           1259    161812    tbl_state_dist_city2    TABLE     	  CREATE TABLE public.tbl_state_dist_city2 (
    _id bigint NOT NULL,
    state character varying(50) DEFAULT NULL::character varying,
    dist character varying(150) DEFAULT NULL::character varying,
    city character varying(150) DEFAULT NULL::character varying
);
 (   DROP TABLE public.tbl_state_dist_city2;
       public         heap    postgres    false            Z           1259    161818    tbl_state_dist_city2__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_state_dist_city2__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.tbl_state_dist_city2__id_seq;
       public          postgres    false    345            �           0    0    tbl_state_dist_city2__id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.tbl_state_dist_city2__id_seq OWNED BY public.tbl_state_dist_city2._id;
          public          postgres    false    346            [           1259    161820    tbl_state_dist_city__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_state_dist_city__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.tbl_state_dist_city__id_seq;
       public          postgres    false    344            �           0    0    tbl_state_dist_city__id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.tbl_state_dist_city__id_seq OWNED BY public.tbl_state_dist_city._id;
          public          postgres    false    347            \           1259    161822    tbl_state_mstr    TABLE     �   CREATE TABLE public.tbl_state_mstr (
    _id bigint NOT NULL,
    state_name character varying(100) DEFAULT NULL::character varying,
    _status integer DEFAULT 1
);
 "   DROP TABLE public.tbl_state_mstr;
       public         heap    postgres    false            ]           1259    161827    tbl_state_mstr__id_seq    SEQUENCE        CREATE SEQUENCE public.tbl_state_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.tbl_state_mstr__id_seq;
       public          postgres    false    348            �           0    0    tbl_state_mstr__id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.tbl_state_mstr__id_seq OWNED BY public.tbl_state_mstr._id;
          public          postgres    false    349            ^           1259    161829    tbl_sub_course_mstr    TABLE     �   CREATE TABLE public.tbl_sub_course_mstr (
    _id integer NOT NULL,
    stream_name character varying,
    course_mstr_id integer,
    _status integer DEFAULT 1
);
 '   DROP TABLE public.tbl_sub_course_mstr;
       public         heap    postgres    false            _           1259    161836    tbl_sub_course_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_sub_course_mstr__id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.tbl_sub_course_mstr__id_seq;
       public          postgres    false    350            �           0    0    tbl_sub_course_mstr__id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.tbl_sub_course_mstr__id_seq OWNED BY public.tbl_sub_course_mstr._id;
          public          postgres    false    351            `           1259    161838    tbl_sub_item_name_mstr    TABLE     =  CREATE TABLE public.tbl_sub_item_name_mstr (
    _id bigint NOT NULL,
    item_name_id bigint,
    sub_item_name character varying(30) DEFAULT NULL::character varying,
    _status integer DEFAULT 1,
    selling_rate numeric(10,2),
    cgst_tax numeric(10,0),
    sgst_tax numeric(10,0),
    igst_tax numeric(10,0)
);
 *   DROP TABLE public.tbl_sub_item_name_mstr;
       public         heap    postgres    false            a           1259    161843    tbl_sub_item_name_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_sub_item_name_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public.tbl_sub_item_name_mstr__id_seq;
       public          postgres    false    352            �           0    0    tbl_sub_item_name_mstr__id_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public.tbl_sub_item_name_mstr__id_seq OWNED BY public.tbl_sub_item_name_mstr._id;
          public          postgres    false    353            b           1259    161845    tbl_sub_stream_mstr    TABLE     �   CREATE TABLE public.tbl_sub_stream_mstr (
    _id integer NOT NULL,
    course_mstr_id integer,
    sub_course_mstr_id integer,
    sub_stream_name character varying,
    _status integer DEFAULT 1
);
 '   DROP TABLE public.tbl_sub_stream_mstr;
       public         heap    postgres    false            c           1259    161852    tbl_sub_stream_mstr__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_sub_stream_mstr__id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.tbl_sub_stream_mstr__id_seq;
       public          postgres    false    354            �           0    0    tbl_sub_stream_mstr__id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.tbl_sub_stream_mstr__id_seq OWNED BY public.tbl_sub_stream_mstr._id;
          public          postgres    false    355            d           1259    161854    tbl_task_assign_details    TABLE     �  CREATE TABLE public.tbl_task_assign_details (
    _id bigint NOT NULL,
    project_mstr_id bigint,
    reassign_task_assign_details_id bigint,
    assigned_emp_details_id bigint,
    task_list_mstr_id bigint,
    other_task text,
    remarks_by_assigned character varying(255) DEFAULT NULL::character varying,
    assign_date_time timestamp without time zone,
    deadline_date_time timestamp without time zone,
    complete_date_time timestamp without time zone,
    assign_by_user_mstr_id bigint,
    assign_by_remarks character varying(255) DEFAULT NULL::character varying,
    created_on timestamp without time zone,
    updated_on timestamp without time zone,
    receive_reject_status integer,
    receive_reject_date timestamp without time zone,
    not_approve_remark character varying,
    approve_not_approve_date timestamp without time zone,
    _status integer DEFAULT 1,
    reject_re_assign_task bigint DEFAULT 0,
    score integer
);
 +   DROP TABLE public.tbl_task_assign_details;
       public         heap    postgres    false            e           1259    161864    tbl_task_assign_details__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_task_assign_details__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.tbl_task_assign_details__id_seq;
       public          postgres    false    356            �           0    0    tbl_task_assign_details__id_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.tbl_task_assign_details__id_seq OWNED BY public.tbl_task_assign_details._id;
          public          postgres    false    357            f           1259    161866    tbl_task_mstr_list    TABLE       CREATE TABLE public.tbl_task_mstr_list (
    _id bigint NOT NULL,
    project_mstr_id bigint,
    task_name character varying(255) DEFAULT NULL::character varying,
    description character varying(255) DEFAULT NULL::character varying,
    _status integer DEFAULT 1
);
 &   DROP TABLE public.tbl_task_mstr_list;
       public         heap    postgres    false            g           1259    161875    tbl_task_mstr_list__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_task_mstr_list__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.tbl_task_mstr_list__id_seq;
       public          postgres    false    358            �           0    0    tbl_task_mstr_list__id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.tbl_task_mstr_list__id_seq OWNED BY public.tbl_task_mstr_list._id;
          public          postgres    false    359            h           1259    161877    tbl_task_workground_details    TABLE     Q  CREATE TABLE public.tbl_task_workground_details (
    id bigint NOT NULL,
    task_assigned_mstr_id bigint NOT NULL,
    subtask_title character varying(255) NOT NULL,
    subtask_description character varying(255) NOT NULL,
    created_at timestamp without time zone,
    status integer DEFAULT 1 NOT NULL,
    task_percent smallint
);
 /   DROP TABLE public.tbl_task_workground_details;
       public         heap    postgres    false            i           1259    161884 "   tbl_task_workground_details_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_task_workground_details_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public.tbl_task_workground_details_id_seq;
       public          postgres    false    360            �           0    0 "   tbl_task_workground_details_id_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public.tbl_task_workground_details_id_seq OWNED BY public.tbl_task_workground_details.id;
          public          postgres    false    361            j           1259    161886    tbl_transaction    TABLE     �  CREATE TABLE public.tbl_transaction (
    _id bigint NOT NULL,
    payer_payee_id bigint,
    generated_amt numeric(10,2) DEFAULT NULL::numeric,
    payable_amt numeric(10,2) DEFAULT NULL::numeric,
    due_amt numeric(10,2) DEFAULT NULL::numeric,
    payment_mode_id bigint,
    other_payment_mode character varying(50) DEFAULT NULL::character varying,
    check_neft_bank_imps_no character varying(50) DEFAULT NULL::character varying,
    cash_voucher_no character varying(50) DEFAULT NULL::character varying,
    created_by bigint,
    created_on timestamp without time zone,
    _status integer DEFAULT 1,
    emp_bank_details_id bigint,
    asset_fine_charge numeric(10,2),
    transaction_type character varying(100),
    remarks text,
    bank_name character varying(100),
    payment_no character varying(50),
    payment_date date,
    transaction_date date,
    project_mstr_id integer
);
 #   DROP TABLE public.tbl_transaction;
       public         heap    postgres    false            k           1259    161899    tbl_transaction__id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_transaction__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.tbl_transaction__id_seq;
       public          postgres    false    362            �           0    0    tbl_transaction__id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.tbl_transaction__id_seq OWNED BY public.tbl_transaction._id;
          public          postgres    false    363            l           1259    161901    tbl_user_mstr    TABLE     0  CREATE TABLE public.tbl_user_mstr (
    _id bigint NOT NULL,
    user_name character varying(100) DEFAULT NULL::character varying,
    user_pass character varying(100) DEFAULT NULL::character varying,
    pass_hint character varying(100) DEFAULT NULL::character varying,
    _status integer DEFAULT 1
);
 !   DROP TABLE public.tbl_user_mstr;
       public         heap    postgres    false            m           1259    161908    tbl_user_mstr__id_seq    SEQUENCE     ~   CREATE SEQUENCE public.tbl_user_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.tbl_user_mstr__id_seq;
       public          postgres    false    364            �           0    0    tbl_user_mstr__id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.tbl_user_mstr__id_seq OWNED BY public.tbl_user_mstr._id;
          public          postgres    false    365            n           1259    161910    tbl_ward_mstr    TABLE     �   CREATE TABLE public.tbl_ward_mstr (
    _id bigint NOT NULL,
    ward_name character varying(50) DEFAULT NULL::character varying,
    _status integer DEFAULT 1,
    state_dist_city_id bigint
);
 !   DROP TABLE public.tbl_ward_mstr;
       public         heap    postgres    false            o           1259    161915    tbl_ward_mstr__id_seq    SEQUENCE     ~   CREATE SEQUENCE public.tbl_ward_mstr__id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.tbl_ward_mstr__id_seq;
       public          postgres    false    366            �           0    0    tbl_ward_mstr__id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.tbl_ward_mstr__id_seq OWNED BY public.tbl_ward_mstr._id;
          public          postgres    false    367            p           1259    161917    tbl_work_performance_details    TABLE     �   CREATE TABLE public.tbl_work_performance_details (
    _id integer NOT NULL,
    quit_id bigint,
    remarks character varying,
    created_by bigint,
    created_on timestamp without time zone,
    _status character varying DEFAULT 1
);
 0   DROP TABLE public.tbl_work_performance_details;
       public         heap    postgres    false            q           1259    161924 (   tbl_work_performance_details_user_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tbl_work_performance_details_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ?   DROP SEQUENCE public.tbl_work_performance_details_user_id_seq;
       public          postgres    false    368            �           0    0 (   tbl_work_performance_details_user_id_seq    SEQUENCE OWNED BY     q   ALTER SEQUENCE public.tbl_work_performance_details_user_id_seq OWNED BY public.tbl_work_performance_details._id;
          public          postgres    false    369            �           2604    161926 &   tbl_account_income_expense_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_account_income_expense_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_account_income_expense_details__id_seq'::regclass);
 U   ALTER TABLE public.tbl_account_income_expense_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    203    202            �           2604    161927 '   tbl_asset_assigned_employee_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_asset_assigned_employee_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_asset_assigned_employee_details__id_seq'::regclass);
 V   ALTER TABLE public.tbl_asset_assigned_employee_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    205    204            �           2604    161928    tbl_asset_details _id    DEFAULT     ~   ALTER TABLE ONLY public.tbl_asset_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_asset_details__id_seq'::regclass);
 D   ALTER TABLE public.tbl_asset_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    207    206            �           2604    161929    tbl_asset_inventory_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_asset_inventory_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_asset_inventory_details_user_id_seq'::regclass);
 N   ALTER TABLE public.tbl_asset_inventory_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    209    208            �           2604    161930    tbl_asset_model_list _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_asset_model_list ALTER COLUMN _id SET DEFAULT nextval('public.tbl_asset_model_list__id_seq'::regclass);
 G   ALTER TABLE public.tbl_asset_model_list ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    211    210            �           2604    161931    tbl_asset_model_no_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_asset_model_no_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_asset_model_no_mstr__id_seq'::regclass);
 J   ALTER TABLE public.tbl_asset_model_no_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    213    212            �           2604    161932 %   tbl_asset_model_repairing_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_asset_model_repairing_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_asset_model_repairing_details__id_seq'::regclass);
 T   ALTER TABLE public.tbl_asset_model_repairing_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    215    214            �           2604    161933    tbl_candidate_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_candidate_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_candidate_details__id_seq'::regclass);
 H   ALTER TABLE public.tbl_candidate_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    217    216            �           2604    161934 "   tbl_candidate_document_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_candidate_document_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_candidate_document_details__id_seq'::regclass);
 Q   ALTER TABLE public.tbl_candidate_document_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    219    218            
           2604    161935 #   tbl_candidate_family_backbgound _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_candidate_family_backbgound ALTER COLUMN _id SET DEFAULT nextval('public.tbl_candidate_family_backbgound__id_seq'::regclass);
 R   ALTER TABLE public.tbl_candidate_family_backbgound ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    221    220                       2604    161936 /   tbl_candidate_first_round_interview_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_candidate_first_round_interview_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_candidate_first_round_interview_details__id_seq'::regclass);
 ^   ALTER TABLE public.tbl_candidate_first_round_interview_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    223    222                       2604    161937 (   tbl_candidate_interview_call_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_candidate_interview_call_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_candidate_interview_call_details__id_seq'::regclass);
 W   ALTER TABLE public.tbl_candidate_interview_call_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    225    224                       2604    161938 *   tbl_candidate_interview_result_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_candidate_interview_result_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_candidate_interview_result_details__id_seq'::regclass);
 Y   ALTER TABLE public.tbl_candidate_interview_result_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    227    226                       2604    161939 $   tbl_candidate_present_employment _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_candidate_present_employment ALTER COLUMN _id SET DEFAULT nextval('public.tbl_candidate_present_employment__id_seq'::regclass);
 S   ALTER TABLE public.tbl_candidate_present_employment ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    229    228                       2604    161940 -   tbl_candidate_previous_employment_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_candidate_previous_employment_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_candidate_previous_employment_details__id_seq'::regclass);
 \   ALTER TABLE public.tbl_candidate_previous_employment_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    231    230            ,           2604    161941 '   tbl_candidate_qualification_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_candidate_qualification_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_candidate_qualification_details__id_seq'::regclass);
 V   ALTER TABLE public.tbl_candidate_qualification_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    233    232            @           2604    161942    tbl_candidate_references _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_candidate_references ALTER COLUMN _id SET DEFAULT nextval('public.tbl_candidate_references__id_seq'::regclass);
 K   ALTER TABLE public.tbl_candidate_references ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    235    234            A           2604    161943 0   tbl_candidate_second_round_interview_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_candidate_second_round_interview_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_candidate_second_round_interview_details__id_seq'::regclass);
 _   ALTER TABLE public.tbl_candidate_second_round_interview_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    237    236            E           2604    161944    tbl_collection _id    DEFAULT     x   ALTER TABLE ONLY public.tbl_collection ALTER COLUMN _id SET DEFAULT nextval('public.tbl_collection__id_seq'::regclass);
 A   ALTER TABLE public.tbl_collection ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    239    238            I           2604    161945    tbl_company_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_company_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_company_details__id_seq'::regclass);
 F   ALTER TABLE public.tbl_company_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    241    240            K           2604    161946    tbl_company_location _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_company_location ALTER COLUMN _id SET DEFAULT nextval('public.tbl_company_location__id_seq'::regclass);
 G   ALTER TABLE public.tbl_company_location ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    243    242            Q           2604    161947    tbl_contact_address_detail _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_contact_address_detail ALTER COLUMN _id SET DEFAULT nextval('public.tbl_contact_address_detail__id_seq'::regclass);
 M   ALTER TABLE public.tbl_contact_address_detail ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    245    244            T           2604    161948    tbl_contact_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_contact_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_contact_details__id_seq'::regclass);
 F   ALTER TABLE public.tbl_contact_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    247    246            V           2604    161949    tbl_contact_other_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_contact_other_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_contact_other_details__id_seq'::regclass);
 L   ALTER TABLE public.tbl_contact_other_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    249    248            X           2604    161950    tbl_contact_type_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_contact_type_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_contact_type_mstr__id_seq'::regclass);
 H   ALTER TABLE public.tbl_contact_type_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    251    250            Z           2604    161951    tbl_course_mstr _id    DEFAULT     z   ALTER TABLE ONLY public.tbl_course_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_course_mstr__id_seq'::regclass);
 B   ALTER TABLE public.tbl_course_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    253    252            ]           2604    161952    tbl_credit_note _id    DEFAULT     z   ALTER TABLE ONLY public.tbl_credit_note ALTER COLUMN _id SET DEFAULT nextval('public.tbl_credit_note__id_seq'::regclass);
 B   ALTER TABLE public.tbl_credit_note ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    255    254            ^           2604    161953    tbl_creditnote_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_creditnote_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_creditnote_details__id_seq'::regclass);
 I   ALTER TABLE public.tbl_creditnote_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    257    256            `           2604    161954    tbl_deduction_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_deduction_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_deduction_mstr__id_seq'::regclass);
 E   ALTER TABLE public.tbl_deduction_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    259    258            b           2604    161955    tbl_department_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_department_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_department_mstr__id_seq'::regclass);
 F   ALTER TABLE public.tbl_department_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    261    260            e           2604    161956    tbl_designation_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_designation_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_designation_mstr__id_seq'::regclass);
 G   ALTER TABLE public.tbl_designation_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    263    262            h           2604    161957    tbl_doc_type_mstr _id    DEFAULT     ~   ALTER TABLE ONLY public.tbl_doc_type_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_doc_type_mstr__id_seq'::regclass);
 D   ALTER TABLE public.tbl_doc_type_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    265    264            k           2604    161958    tbl_earning_mstr _id    DEFAULT     |   ALTER TABLE ONLY public.tbl_earning_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_earning_mstr__id_seq'::regclass);
 C   ALTER TABLE public.tbl_earning_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    267    266            u           2604    161959    tbl_emp_bank_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_emp_bank_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_emp_bank_details__id_seq'::regclass);
 G   ALTER TABLE public.tbl_emp_bank_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    269    268            �           2604    161960    tbl_emp_details _id    DEFAULT     z   ALTER TABLE ONLY public.tbl_emp_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_emp_details__id_seq'::regclass);
 B   ALTER TABLE public.tbl_emp_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    271    270            �           2604    161961    tbl_emp_document_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_emp_document_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_emp_document_details__id_seq'::regclass);
 K   ALTER TABLE public.tbl_emp_document_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    273    272            �           2604    161962    tbl_emp_family_backbgound _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_emp_family_backbgound ALTER COLUMN _id SET DEFAULT nextval('public.tbl_emp_family_backbgound__id_seq'::regclass);
 L   ALTER TABLE public.tbl_emp_family_backbgound ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    275    274            �           2604    161963    tbl_emp_present_employment _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_emp_present_employment ALTER COLUMN _id SET DEFAULT nextval('public.tbl_emp_present_employment__id_seq'::regclass);
 M   ALTER TABLE public.tbl_emp_present_employment ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    277    276            �           2604    161964 '   tbl_emp_previous_employment_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_emp_previous_employment_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_emp_previous_employment_details__id_seq'::regclass);
 V   ALTER TABLE public.tbl_emp_previous_employment_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    279    278            �           2604    161965 !   tbl_emp_qualification_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_emp_qualification_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_emp_qualification_details__id_seq'::regclass);
 P   ALTER TABLE public.tbl_emp_qualification_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    281    280            �           2604    161966    tbl_emp_references _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_emp_references ALTER COLUMN _id SET DEFAULT nextval('public.tbl_emp_references__id_seq'::regclass);
 E   ALTER TABLE public.tbl_emp_references ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    283    282            �           2604    161967    tbl_employee_leave_detail _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_employee_leave_detail ALTER COLUMN _id SET DEFAULT nextval('public.tbl_employee_leave_detail__id_seq'::regclass);
 L   ALTER TABLE public.tbl_employee_leave_detail ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    285    284            �           2604    161968    tbl_employee_quit_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_employee_quit_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_employee_quit_details__id_seq'::regclass);
 L   ALTER TABLE public.tbl_employee_quit_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    287    286            �           2604    161969    tbl_employment_type_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_employment_type_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_employment_type_mstr__id_seq'::regclass);
 K   ALTER TABLE public.tbl_employment_type_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    289    288                        2604    161970    tbl_estimate _id    DEFAULT     t   ALTER TABLE ONLY public.tbl_estimate ALTER COLUMN _id SET DEFAULT nextval('public.tbl_estimate__id_seq'::regclass);
 ?   ALTER TABLE public.tbl_estimate ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    291    290                       2604    161971    tbl_estimate_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_estimate_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_estimate_details__id_seq'::regclass);
 G   ALTER TABLE public.tbl_estimate_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    293    292                       2604    161972    tbl_floor_mstr _id    DEFAULT     x   ALTER TABLE ONLY public.tbl_floor_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_floor_mstr__id_seq'::regclass);
 A   ALTER TABLE public.tbl_floor_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    295    294                       2604    161973    tbl_generate_salary_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_generate_salary_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_generate_salary_details__id_seq'::regclass);
 N   ALTER TABLE public.tbl_generate_salary_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    297    296                       2604    161974    tbl_grade_mstr _id    DEFAULT     x   ALTER TABLE ONLY public.tbl_grade_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_grade_mstr__id_seq'::regclass);
 A   ALTER TABLE public.tbl_grade_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    299    298                       2604    161975    tbl_interview_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_interview_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_interview_details__id_seq'::regclass);
 H   ALTER TABLE public.tbl_interview_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    301    300                       2604    161976 %   tbl_interview_interviewer_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_interview_interviewer_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_interview_interviewer_details__id_seq'::regclass);
 T   ALTER TABLE public.tbl_interview_interviewer_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    303    302            !           2604    161977 )   tbl_interview_job_description_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_interview_job_description_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_interview_job_description_details__id_seq'::regclass);
 X   ALTER TABLE public.tbl_interview_job_description_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    305    304            #           2604    161978    tbl_interview_round_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_interview_round_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_interview_round_details__id_seq'::regclass);
 N   ALTER TABLE public.tbl_interview_round_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    307    306            %           2604    161979    tbl_invoice _id    DEFAULT     r   ALTER TABLE ONLY public.tbl_invoice ALTER COLUMN _id SET DEFAULT nextval('public.tbl_invoice__id_seq'::regclass);
 >   ALTER TABLE public.tbl_invoice ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    309    308            (           2604    161980    tbl_invoice_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_invoice_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_invoice_details__id_seq'::regclass);
 F   ALTER TABLE public.tbl_invoice_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    311    310            *           2604    161981    tbl_item_name_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_item_name_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_item_name_mstr__id_seq'::regclass);
 E   ALTER TABLE public.tbl_item_name_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    313    312            4           2604    161982    tbl_job_post_detail _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_job_post_detail ALTER COLUMN _id SET DEFAULT nextval('public.tbl_job_post_detail__id_seq'::regclass);
 F   ALTER TABLE public.tbl_job_post_detail ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    315    314            5           2604    161983 &   tbl_job_post_qualification_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_job_post_qualification_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_job_post_qualification_details__id_seq'::regclass);
 U   ALTER TABLE public.tbl_job_post_qualification_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    317    316            7           2604    161984    tbl_leave _id    DEFAULT     n   ALTER TABLE ONLY public.tbl_leave ALTER COLUMN _id SET DEFAULT nextval('public.tbl_leave__id_seq'::regclass);
 <   ALTER TABLE public.tbl_leave ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    319    318            9           2604    161985    tbl_leave_mstr _id    DEFAULT     x   ALTER TABLE ONLY public.tbl_leave_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_leave_mstr__id_seq'::regclass);
 A   ALTER TABLE public.tbl_leave_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    321    320            ;           2604    161986    tbl_leave_type_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_leave_type_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_leave_type_mstr__id_seq'::regclass);
 F   ALTER TABLE public.tbl_leave_type_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    323    322            =           2604    161987    tbl_login_details _id    DEFAULT     ~   ALTER TABLE ONLY public.tbl_login_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_login_details__id_seq'::regclass);
 D   ALTER TABLE public.tbl_login_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    325    324            A           2604    161988    tbl_menu_mstr _id    DEFAULT     |   ALTER TABLE ONLY public.tbl_menu_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_menu_permission__id_seq'::regclass);
 @   ALTER TABLE public.tbl_menu_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    328    326            G           2604    161989    tbl_menu_permission _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_menu_permission ALTER COLUMN _id SET DEFAULT nextval('public.tbl_menu_permission__id_seq1'::regclass);
 F   ALTER TABLE public.tbl_menu_permission ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    329    327            I           2604    161990    tbl_notification_detail _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_notification_detail ALTER COLUMN _id SET DEFAULT nextval('public.tbl_notification_detail__id_seq'::regclass);
 J   ALTER TABLE public.tbl_notification_detail ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    331    330            N           2604    161991    tbl_on_reporting_leave_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_on_reporting_leave_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_on_reporting_leave_mstr__id_seq'::regclass);
 N   ALTER TABLE public.tbl_on_reporting_leave_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    333    332            P           2604    161992    tbl_payment_mode_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_payment_mode_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_payment_mode_mstr__id_seq'::regclass);
 H   ALTER TABLE public.tbl_payment_mode_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    335    334            Z           2604    161993    tbl_project_mstr _id    DEFAULT     |   ALTER TABLE ONLY public.tbl_project_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_project_mstr__id_seq'::regclass);
 C   ALTER TABLE public.tbl_project_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    339    336            [           2604    161994    tbl_project_mstr_address _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_project_mstr_address ALTER COLUMN _id SET DEFAULT nextval('public.tbl_project_mstr__address__id_seq'::regclass);
 K   ALTER TABLE public.tbl_project_mstr_address ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    338    337            ]           2604    161995 $   tbl_project_ward_permission_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_project_ward_permission_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_project_ward_permission_mstr__id_seq'::regclass);
 S   ALTER TABLE public.tbl_project_ward_permission_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    341    340            _           2604    161996    tbl_relation_mstr _id    DEFAULT     ~   ALTER TABLE ONLY public.tbl_relation_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_relation_mstr__id_seq'::regclass);
 D   ALTER TABLE public.tbl_relation_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    343    342            b           2604    161997    tbl_state_dist_city _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_state_dist_city ALTER COLUMN _id SET DEFAULT nextval('public.tbl_state_dist_city__id_seq'::regclass);
 F   ALTER TABLE public.tbl_state_dist_city ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    347    344            f           2604    161998    tbl_state_dist_city2 _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_state_dist_city2 ALTER COLUMN _id SET DEFAULT nextval('public.tbl_state_dist_city2__id_seq'::regclass);
 G   ALTER TABLE public.tbl_state_dist_city2 ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    346    345            j           2604    161999    tbl_state_mstr _id    DEFAULT     x   ALTER TABLE ONLY public.tbl_state_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_state_mstr__id_seq'::regclass);
 A   ALTER TABLE public.tbl_state_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    349    348            m           2604    162000    tbl_sub_course_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_sub_course_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_sub_course_mstr__id_seq'::regclass);
 F   ALTER TABLE public.tbl_sub_course_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    351    350            o           2604    162001    tbl_sub_item_name_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_sub_item_name_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_sub_item_name_mstr__id_seq'::regclass);
 I   ALTER TABLE public.tbl_sub_item_name_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    353    352            r           2604    162002    tbl_sub_stream_mstr _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_sub_stream_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_sub_stream_mstr__id_seq'::regclass);
 F   ALTER TABLE public.tbl_sub_stream_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    355    354            t           2604    162003    tbl_task_assign_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_task_assign_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_task_assign_details__id_seq'::regclass);
 J   ALTER TABLE public.tbl_task_assign_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    357    356            y           2604    162004    tbl_task_mstr_list _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_task_mstr_list ALTER COLUMN _id SET DEFAULT nextval('public.tbl_task_mstr_list__id_seq'::regclass);
 E   ALTER TABLE public.tbl_task_mstr_list ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    359    358            }           2604    162005    tbl_task_workground_details id    DEFAULT     �   ALTER TABLE ONLY public.tbl_task_workground_details ALTER COLUMN id SET DEFAULT nextval('public.tbl_task_workground_details_id_seq'::regclass);
 M   ALTER TABLE public.tbl_task_workground_details ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    361    360            �           2604    162006    tbl_transaction _id    DEFAULT     z   ALTER TABLE ONLY public.tbl_transaction ALTER COLUMN _id SET DEFAULT nextval('public.tbl_transaction__id_seq'::regclass);
 B   ALTER TABLE public.tbl_transaction ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    363    362            �           2604    162007    tbl_user_mstr _id    DEFAULT     v   ALTER TABLE ONLY public.tbl_user_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_user_mstr__id_seq'::regclass);
 @   ALTER TABLE public.tbl_user_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    365    364            �           2604    162008    tbl_ward_mstr _id    DEFAULT     v   ALTER TABLE ONLY public.tbl_ward_mstr ALTER COLUMN _id SET DEFAULT nextval('public.tbl_ward_mstr__id_seq'::regclass);
 @   ALTER TABLE public.tbl_ward_mstr ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    367    366            �           2604    162009     tbl_work_performance_details _id    DEFAULT     �   ALTER TABLE ONLY public.tbl_work_performance_details ALTER COLUMN _id SET DEFAULT nextval('public.tbl_work_performance_details_user_id_seq'::regclass);
 O   ALTER TABLE public.tbl_work_performance_details ALTER COLUMN _id DROP DEFAULT;
       public          postgres    false    369    368            �          0    160964 "   tbl_account_income_expense_details 
   TABLE DATA           �   COPY public.tbl_account_income_expense_details (_id, income_expense, account_type, transaction_date_time, payment_mode_id, transaction_type, payer_payee_name, profit_amount, loss_amount, created_by, transaction_id, _status) FROM stdin;
    public          postgres    false    202   F�      �          0    160970 #   tbl_asset_assigned_employee_details 
   TABLE DATA           �   COPY public.tbl_asset_assigned_employee_details (_id, asset_model_id, assigned_employee_id, asset_type, item_name_id, sub_item_name_id, created_by, created_on, _status, asset_model_no_id, quantity) FROM stdin;
    public          postgres    false    204   *�      �          0    160977    tbl_asset_details 
   TABLE DATA           K  COPY public.tbl_asset_details (_id, asset_type, item_name_id, sub_item_name_id, asset_model_no_id, supplier_name, supplier_address, supplier_contact_no, order_no, purchase_cost, warranty_month_no, purchase_date, expiry_date, manufacturer_name, bill_attachment, remarks, created_on, created_by, _status, asset_quantity) FROM stdin;
    public          postgres    false    206   d�      �          0    160996    tbl_asset_inventory_details 
   TABLE DATA           �   COPY public.tbl_asset_inventory_details (_id, quit_id, item_name_id, sub_item_name_id, serial_no_id, condition_status, created_on, created_by, _status, penalty_amount) FROM stdin;
    public          postgres    false    208   ��      �          0    161005    tbl_asset_model_list 
   TABLE DATA           �   COPY public.tbl_asset_model_list (_id, asset_details_id, asset_barcode_no, asset_serial_no, asset_status, created_on, created_by, _status, asset_type, item_name_id, sub_item_name_id, asset_model_no_id) FROM stdin;
    public          postgres    false    210   ]�      �          0    161014    tbl_asset_model_no_mstr 
   TABLE DATA           i   COPY public.tbl_asset_model_no_mstr (_id, item_name_id, sub_item_name_id, model_no, _status) FROM stdin;
    public          postgres    false    212   z�      �          0    161021 !   tbl_asset_model_repairing_details 
   TABLE DATA           �   COPY public.tbl_asset_model_repairing_details (_id, asset_details_id, asset_model_id, repairing_date, charge_amount, created_on, created_by, _status) FROM stdin;
    public          postgres    false    214   A�      �          0    161029    tbl_candidate_details 
   TABLE DATA           �  COPY public.tbl_candidate_details (_id, job_post_details_id, department_mstr_id, designation_mstr_id, ref_code, first_name, middle_name, last_name, present_address, present_city, present_district, present_state, present_pin_code, permanent_address, permanent_city, permanent_district, permanent_state, permanent_pin_code, d_o_b, gender, marital_status, spouse_name, height, weight, blood_group, personal_phone_no, other_phone_no, email_id, photo_path, joining_date, provident_fund_no, employee_state_insurance_no, experience_overall_relevant, mentioned_any_special_information, languages_know, leisure_activity, relations_working_in_this_company, your_state_of_health, services_agreement, are_you_willing_to_be_posted_anywhere_in_india, have_you_applied_before_in_this_company, created_by_emp_detais_id, created_on, updated_on, recruitment_status, recruitment_accept_reject_by_emp_details_id, recruitment_reject_remarks, negotiation_status, negotiation_by_emp_details_id, negotiation_reject_remarks, _status, step_status, offer_letter_path, offer_letter_given_timestamp, offer_letter_send_by_emp_details, deactivate_status, deactivate_comment) FROM stdin;
    public          postgres    false    216   ^�      �          0    161070    tbl_candidate_document_details 
   TABLE DATA           �   COPY public.tbl_candidate_document_details (_id, candidate_details_id, doc_type_mstr_id, other_doc_name, doc_no, date_of_issue, place_of_issue, valid_upto, doc_path, created_on, updated_on, _status) FROM stdin;
    public          postgres    false    218   �      �          0    161080    tbl_candidate_family_backbgound 
   TABLE DATA           W  COPY public.tbl_candidate_family_backbgound (_id, candidate_details_id, father_name, father_occupation, father_contact_no, father_address, mother_name, mother_occupation, mother_contact_no, mother_address, brother_name, brother_occupation, brother_contact_no, brother_address, sister_name, sister_occupation, sister_contact_no, sister_address, brother_in_law_name, brother_in_law_occupation, brother_in_law_contact_no, brother_in_law_address, spouse_name, spouse_occupation, spouse_contact_no, spouse_address, friend1_name, friend1_occupation, friend1_contact_no, friend1_address, friend2_name, friend2_occupation, friend2_contact_no, friend2_address, relative1_name, relative1_occupation, relative1_contact_no, relative1_address, relative2_name, relative2_occupation, relative2_contact_no, relative2_address, created_on, updated_on, _status) FROM stdin;
    public          postgres    false    220   �      �          0    161129 +   tbl_candidate_first_round_interview_details 
   TABLE DATA           �   COPY public.tbl_candidate_first_round_interview_details (_id, candidate_id, interview_round_id, round_status, remarks, created_by, date_time, _status, performance, secondrounddate, secondroundtime) FROM stdin;
    public          postgres    false    222   �#      �          0    161139 $   tbl_candidate_interview_call_details 
   TABLE DATA           �   COPY public.tbl_candidate_interview_call_details (_id, candidate_id, interview_venue_id, designation_id, interview_date, interview_time, date_time, created_on, _status) FROM stdin;
    public          postgres    false    224   n%      �          0    161146 &   tbl_candidate_interview_result_details 
   TABLE DATA           �   COPY public.tbl_candidate_interview_result_details (_id, candidate_id, interview_round_id, round_status, remarks, date_time, _status) FROM stdin;
    public          postgres    false    226   n&      �          0    161155     tbl_candidate_present_employment 
   TABLE DATA           �  COPY public.tbl_candidate_present_employment (_id, candidate_details_id, present_name_of_employer, present_address_of_organisation, present_date_of_joining_from, present_brief_desc_of_present_job, present_basic_salary, present_hra, present_total_monthly_amt, present_other_emoluments_pf_lta_medical, present_any_benefits_facilities, present_expected_salary_pf_contribution_bonus, present_join_notice_period, created_on, updated_on, _status, present_date_of_joining_to) FROM stdin;
    public          postgres    false    228   �&      �          0    161173 )   tbl_candidate_previous_employment_details 
   TABLE DATA           5  COPY public.tbl_candidate_previous_employment_details (_id, candidate_details_id, previous_period_from, previous_period_to, previous_experience, previous_organization_name_address, previous_designation, previous_monthly_emoluments, previous_brief_job_description, created_on, updated_on, _status) FROM stdin;
    public          postgres    false    230   0'      �          0    161186 #   tbl_candidate_qualification_details 
   TABLE DATA           4  COPY public.tbl_candidate_qualification_details (_id, candidate_details_id, course_mstr_id, other_course, medium_type, passing_year, school_college_institute_name, board_university_name, marks_percent, attachment_doc_path, created_on, updated_on, _status, sub_course_mstr_id, sub_stream_mstr_id) FROM stdin;
    public          postgres    false    232   M'      �          0    161202    tbl_candidate_references 
   TABLE DATA           �  COPY public.tbl_candidate_references (_id, candidate_details_id, reference_name_designation_organisation1, reference_phone_no_email_id1, reference_address_of_communication1, reference_social_professinal1, reference_name_designation_organisation2, reference_phone_no_email_id2, reference_address_of_communication2, reference_social_professinal2, reference_name_designation_organisation3, reference_phone_no_email_id3, reference_address_of_communication3, reference_social_professinal3, reference_name_designation_organisation4, reference_phone_no_email_id4, reference_address_of_communication4, reference_social_professinal4, reference_name_designation_organisation5, reference_phone_no_email_id5, reference_address_of_communication5, reference_social_professinal5, reference_name_designation_organisation6, reference_phone_no_email_id6, reference_address_of_communication6, reference_social_professinal6, created_on, updated_on, _status) FROM stdin;
    public          postgres    false    234   �E      �          0    161229 ,   tbl_candidate_second_round_interview_details 
   TABLE DATA           �   COPY public.tbl_candidate_second_round_interview_details (_id, candidate_id, interview_round_id, basic_salary, round_status, remarks, created_by, date_time, _status, date_of_joining, performance) FROM stdin;
    public          postgres    false    236   �E      �          0    161240    tbl_collection 
   TABLE DATA           �   COPY public.tbl_collection (_id, payer_payee_id, transaction_id, generate_id, paid_amt, month_year, _status, asset_fine_charge, transaction_type, payer_payee_name, accounting_equation, remarks, doc_path, bill_voucher_no, tax_amt) FROM stdin;
    public          postgres    false    238   G      �          0    161251    tbl_company_details 
   TABLE DATA           r   COPY public.tbl_company_details (_id, company_name, website, cin_no, pan_no, tin_no, tds_no, _status) FROM stdin;
    public          postgres    false    240   Z�      �          0    161260    tbl_company_location 
   TABLE DATA           �   COPY public.tbl_company_location (_id, company_id, address, gstin_no, contact_no, email_id, office_type, remark, deactivated_by, deactivated_date, re_activated_date, re_activated_by, _status, landmark, state_dist_city_id) FROM stdin;
    public          postgres    false    242   ׮      �          0    161273    tbl_contact_address_detail 
   TABLE DATA           �   COPY public.tbl_contact_address_detail (_id, address_type, contact_id, attention, address, phoneno, is_default, _status, state_name) FROM stdin;
    public          postgres    false    244   ��      �          0    161280    tbl_contact_details 
   TABLE DATA           �   COPY public.tbl_contact_details (_id, contact_type_id, contact_code, contact_name, contact_no, contact_person_name, contact_email_id, gstin_no, _status, others) FROM stdin;
    public          postgres    false    246   ��      �          0    161289    tbl_contact_other_details 
   TABLE DATA           �   COPY public.tbl_contact_other_details (_id, contact_id, other_contact_person_name, other_contact_no, other_contact_emailid, _status) FROM stdin;
    public          postgres    false    248   '�      �          0    161295    tbl_contact_type_mstr 
   TABLE DATA           K   COPY public.tbl_contact_type_mstr (_id, contact_type, _status) FROM stdin;
    public          postgres    false    250   ��      �          0    161301    tbl_course_mstr 
   TABLE DATA           D   COPY public.tbl_course_mstr (_id, course_name, _status) FROM stdin;
    public          postgres    false    252   ն      �          0    161310    tbl_credit_note 
   TABLE DATA           �   COPY public.tbl_credit_note (credit_note_no, invoice_no, invoice_date, payment_due_date, sub_bill_amt, cgst_total_tax, sgst_total_tax, igst_total_tax, discount_amt, bill_amt, credit_note_date, date_time, user_id, _status, _id) FROM stdin;
    public          postgres    false    254   J�      �          0    161316    tbl_creditnote_details 
   TABLE DATA             COPY public.tbl_creditnote_details (creditnote_id, _id, item_mstr_id, sub_item_mstr_id, item_quantity, item_per_rate, total_amt, cgst_tax_per, sgst_tax_per, igst_tax_per, cgst_tax_amt, sgst_tax_amt, igst_tax_amt, total_tax_amt, sub_item_description, _status) FROM stdin;
    public          postgres    false    256   [�      �          0    161325    tbl_deduction_mstr 
   TABLE DATA           {   COPY public.tbl_deduction_mstr (_id, provident_fund, esic, professional_tax, tds, _status, employment_type_id) FROM stdin;
    public          postgres    false    258   ٹ      �          0    161331    tbl_department_mstr 
   TABLE DATA           F   COPY public.tbl_department_mstr (_id, dept_name, _status) FROM stdin;
    public          postgres    false    260   S�      �          0    161338    tbl_designation_mstr 
   TABLE DATA           q   COPY public.tbl_designation_mstr (_id, department_mstr_id, grade_mstr_id, designation_name, _status) FROM stdin;
    public          postgres    false    262   ��      �          0    161345    tbl_doc_type_mstr 
   TABLE DATA           C   COPY public.tbl_doc_type_mstr (_id, doc_name, _status) FROM stdin;
    public          postgres    false    264   �      �          0    161352    tbl_earning_mstr 
   TABLE DATA           �   COPY public.tbl_earning_mstr (_id, employment_type_id, dearness_allowance, transport_allowance, house_rent_allowance, medical_reimbursement, min_salary, max_salary, grade_id, esic, epf, other, work_type, _status) FROM stdin;
    public          postgres    false    266   ��      �          0    161361    tbl_emp_bank_details 
   TABLE DATA           �   COPY public.tbl_emp_bank_details (_id, emp_details_id, bank_name, branch_name, account_no, confirm_account_no, acc_holder_name, ifsc_code, default_status, _status) FROM stdin;
    public          postgres    false    268   ��      �          0    161374    tbl_emp_details 
   TABLE DATA           J  COPY public.tbl_emp_details (_id, department_mstr_id, designation_mstr_id, employment_type_mstr_id, user_mstr_id, employee_code, biometric_employee_code, first_name, middle_name, last_name, present_address, present_city, present_district, present_state, present_pin_code, permanent_address, permanent_city, permanent_district, permanent_state, permanent_pin_code, d_o_b, gender, marital_status, spouse_name, height, weight, blood_group, personal_phone_no, other_phone_no, email_id, photo_path, joining_date, provident_fund_no, employee_state_insurance_no, experience_overall_relevant, mentioned_any_special_information, languages_know, leisure_activity, relations_working_in_this_company, your_state_of_health, services_agreement, are_you_willing_to_be_posted_anywhere_in_india, have_you_applied_before_in_this_company, candidate_details_id, offer_latter_path, offer_latter_given_timestamp, created_by_emp_details_id, created_on, updated_on, step_status, _status, monthly_salary, work_type, grade_mstr_id, company_location_id, project_mstr_id, project_concept_type, project_visibility) FROM stdin;
    public          postgres    false    270   �      �          0    161416    tbl_emp_document_details 
   TABLE DATA           �   COPY public.tbl_emp_document_details (_id, emp_details_id, doc_type_mstr_id, other_doc_name, doc_no, date_of_issue, place_of_issue, valid_upto, doc_path, created_on, updated_on, _status) FROM stdin;
    public          postgres    false    272   ��      �          0    161426    tbl_emp_family_backbgound 
   TABLE DATA           K  COPY public.tbl_emp_family_backbgound (_id, emp_details_id, father_name, father_occupation, father_contact_no, father_address, mother_name, mother_occupation, mother_contact_no, mother_address, brother_name, brother_occupation, brother_contact_no, brother_address, sister_name, sister_occupation, sister_contact_no, sister_address, brother_in_law_name, brother_in_law_occupation, brother_in_law_contact_no, brother_in_law_address, spouse_name, spouse_occupation, spouse_contact_no, spouse_address, friend1_name, friend1_occupation, friend1_contact_no, friend1_address, friend2_name, friend2_occupation, friend2_contact_no, friend2_address, relative1_name, relative1_occupation, relative1_contact_no, relative1_address, relative2_name, relative2_occupation, relative2_contact_no, relative2_address, created_on, updated_on, _status) FROM stdin;
    public          postgres    false    274   �      �          0    161475    tbl_emp_present_employment 
   TABLE DATA           �  COPY public.tbl_emp_present_employment (_id, emp_details_id, present_name_of_employer, present_address_of_organisation, present_date_of_joining, present_brief_desc_of_present_job, present_basic_salary, present_hra, present_total_monthly_amt, present_other_emoluments_pf_lta_medical, present_any_benefits_facilities, present_expected_salary_pf_contribution_bonus, present_join_notice_period, created_on, updated_on, _status) FROM stdin;
    public          postgres    false    276   ��      �          0    161493 #   tbl_emp_previous_employment_details 
   TABLE DATA           )  COPY public.tbl_emp_previous_employment_details (_id, emp_details_id, previous_period_from, previous_period_to, previous_experience, previous_organization_name_address, previous_designation, previous_monthly_emoluments, previous_brief_job_description, created_on, updated_on, _status) FROM stdin;
    public          postgres    false    278   
�      �          0    161506    tbl_emp_qualification_details 
   TABLE DATA           ?  COPY public.tbl_emp_qualification_details (_id, emp_details_id, course_mstr_id, other_course, course_specialization, medium_type, passing_year, school_college_institute_name, board_university_name, marks_percent, attachment_doc_path, created_on, updated_on, _status, sub_course_mstr_id, sub_stream_mstr_id) FROM stdin;
    public          postgres    false    280   U�                 0    161523    tbl_emp_references 
   TABLE DATA           �  COPY public.tbl_emp_references (_id, emp_details_id, reference_name_designation_organisation1, reference_phone_no_email_id1, reference_address_of_communication1, reference_social_professinal1, reference_name_designation_organisation2, reference_phone_no_email_id2, reference_address_of_communication2, reference_social_professinal2, reference_name_designation_organisation3, reference_phone_no_email_id3, reference_address_of_communication3, reference_social_professinal3, reference_name_designation_organisation4, reference_phone_no_email_id4, reference_address_of_communication4, reference_social_professinal4, reference_name_designation_organisation5, reference_phone_no_email_id5, reference_address_of_communication5, reference_social_professinal5, reference_name_designation_organisation6, reference_phone_no_email_id6, reference_address_of_communication6, reference_social_professinal6, created_on, updated_on, _status) FROM stdin;
    public          postgres    false    282                    0    161550    tbl_employee_leave_detail 
   TABLE DATA           �  COPY public.tbl_employee_leave_detail (_id, employee_id, leave_from_date, leave_to_date, leave_type_id, leave_reason, financial_year, leave_request_datetime, _status, old_leave_type_id, approve_reject_reason, leave_days, old_leave_days, paid_leave, cancel_remarks, reporting_head_emp_id, approve_reject_cancel_remarks, old_leave_from_date, old_leave_to_date, reporting_tl_emp_id, reporting_head_leave_type_id, hr_remarks) FROM stdin;
    public          postgres    false    284   �                0    161560    tbl_employee_quit_details 
   TABLE DATA           M  COPY public.tbl_employee_quit_details (_id, employee_id, terminate_resign_reason, asset_submission_date, resign_terminate_type, request_datetime, created_by, old_notice_period, _status, reject_resign_reason, accept_reject_datetime, notice_period, final_settlment_date, create_experience_letter, upload_experience_letter) FROM stdin;
    public          postgres    false    286                   0    161569    tbl_employment_type_mstr 
   TABLE DATA           Q   COPY public.tbl_employment_type_mstr (_id, employment_type, _status) FROM stdin;
    public          postgres    false    288   6                0    161576    tbl_estimate 
   TABLE DATA           �  COPY public.tbl_estimate (_id, contact_details_id, ship_from_state, bill_to_state, ship_to_state, estimate_no, estimate_date, estimate_expiry_date, sub_bill_amt, cgst_total_tax, sgst_total_tax, igst_total_tax, sub_tax_bill_amt, discount_type, discount_rate, discount_amt, bill_amt, customer_notes, terms_and_conditions, datetime, user_id, ip_address, work_order_status, work_order_received_date, work_order_attach_path, work_order_remarks, work_order_entry_datetime, work_order_entry_by, _status) FROM stdin;
    public          postgres    false    290   �      
          0    161586    tbl_estimate_details 
   TABLE DATA           )  COPY public.tbl_estimate_details (_id, estimate_id, asset_type, item_mstr_id, sub_item_mstr_id, item_quantity, item_per_rate, total_amt, cgst_tax_per, sgst_tax_per, igst_tax_per, cgst_tax_amt, sgst_tax_amt, igst_tax_amt, total_tax_amt, grande_total_amt, sub_item_description, _status) FROM stdin;
    public          postgres    false    292   �                0    161592    tbl_floor_mstr 
   TABLE DATA           B   COPY public.tbl_floor_mstr (_id, floor_name, _status) FROM stdin;
    public          postgres    false    294   �                0    161598    tbl_generate_salary_details 
   TABLE DATA           �  COPY public.tbl_generate_salary_details (_id, employee_id, month_year, financial_year, working_days, present_days, paid_leave, basic_salary, da_percent, ta_percent, hra_percent, mr_percent, epf_percent, esic_percent, other_tax_percent, prepared_salary, final_prepared_salary, employment_type_id, created_by, created_on, _status, work_type, attended_hours, salary_slip_no, incentive_amt) FROM stdin;
    public          postgres    false    296   �                0    161619    tbl_grade_mstr 
   TABLE DATA           Z   COPY public.tbl_grade_mstr (_id, grade_type, _status, min_salary, max_salary) FROM stdin;
    public          postgres    false    298   �                0    161629    tbl_interview_details 
   TABLE DATA           �   COPY public.tbl_interview_details (_id, project_name_id, post_name_id, interview_location_id, interview_start_date, interview_end_date, interview_start_time, interview_end_time, created_on, created_by, _status, job_post_detail_id) FROM stdin;
    public          postgres    false    300   6                0    161637 !   tbl_interview_interviewer_details 
   TABLE DATA           �   COPY public.tbl_interview_interviewer_details (_id, interview_details_id, interview_round_id, interviewer_id, _status) FROM stdin;
    public          postgres    false    302   Q                0    161643 %   tbl_interview_job_description_details 
   TABLE DATA           q   COPY public.tbl_interview_job_description_details (_id, interview_call_id, job_description, _status) FROM stdin;
    public          postgres    false    304   �                0    161649    tbl_interview_round_details 
   TABLE DATA           �   COPY public.tbl_interview_round_details (_id, interview_details_id, department_id, designation_id, description, _status, round_name, interview_type) FROM stdin;
    public          postgres    false    306   �                0    161658    tbl_invoice 
   TABLE DATA           �  COPY public.tbl_invoice (_id, contact_details_id, ship_from_state, bill_to_state, ship_to_state, invoice_no, invoice_date, payment_due_date, sub_bill_amt, cgst_total_tax, sgst_total_tax, igst_total_tax, sub_tax_bill_amt, discount_type, discount_rate, discount_amt, bill_amt, user_id, ip_address, paid_status, customer_note, terms_and_conditions, _status, datetime, invoice_cancel_date, invoice_cancel_remarks) FROM stdin;
    public          postgres    false    308   #                0    161668    tbl_invoice_details 
   TABLE DATA           '  COPY public.tbl_invoice_details (_id, invoice_id, asset_type, item_mstr_id, sub_item_mstr_id, item_quantity, item_per_rate, total_amt, cgst_tax_per, sgst_tax_per, igst_tax_per, cgst_tax_amt, sgst_tax_amt, igst_tax_amt, total_tax_amt, grande_total_amt, sub_item_description, _status) FROM stdin;
    public          postgres    false    310   d'                0    161674    tbl_item_name_mstr 
   TABLE DATA           Q   COPY public.tbl_item_name_mstr (_id, asset_type, item_name, _status) FROM stdin;
    public          postgres    false    312   �(                 0    161682    tbl_job_post_detail 
   TABLE DATA           Q  COPY public.tbl_job_post_detail (_id, designation_mstr_id, job_description, employment_type_mstr_id, required_min_experience, required_qualification, key_skills, no_of_opening, entry_date, expiry_date, job_post_by_emp_detais_id, created_on, updated_on, _status, required_max_experience, company_location_id, project_name_id) FROM stdin;
    public          postgres    false    314   7*      "          0    161696 "   tbl_job_post_qualification_details 
   TABLE DATA           �   COPY public.tbl_job_post_qualification_details (_id, job_post_details_id, course_mstr_id, sub_course_mstr_id, sub_stream_mstr_id, _status) FROM stdin;
    public          postgres    false    316   �+      $          0    161702 	   tbl_leave 
   TABLE DATA           t   COPY public.tbl_leave (_id, grade_id, from_date, to_date, day, leave_type_id, reason, user_id, _status) FROM stdin;
    public          postgres    false    318   ~,      &          0    161711    tbl_leave_mstr 
   TABLE DATA           [   COPY public.tbl_leave_mstr (_id, leave_type_id, leave_days, grade_id, _status) FROM stdin;
    public          postgres    false    320   �,      (          0    161717    tbl_leave_type_mstr 
   TABLE DATA           S   COPY public.tbl_leave_type_mstr (_id, leave_type, leave_days, _status) FROM stdin;
    public          postgres    false    322   �,      *          0    161726    tbl_login_details 
   TABLE DATA              COPY public.tbl_login_details (_id, emp_details_id, device_type, imei_no, ip_address, _token, created_on, _status) FROM stdin;
    public          postgres    false    324   ]-      ,          0    161734    tbl_menu_mstr 
   TABLE DATA           g   COPY public.tbl_menu_mstr (_id, menu_name, menu_path, under_menu_mstr_id, _order, _status) FROM stdin;
    public          postgres    false    326   �      -          0    161742    tbl_menu_permission 
   TABLE DATA           ^   COPY public.tbl_menu_permission (_id, menu_mstr_id, designation_mstr_id, _status) FROM stdin;
    public          postgres    false    327   �      0          0    161750    tbl_notification_detail 
   TABLE DATA           �   COPY public.tbl_notification_detail (_id, title, about, link, department_mstr_id, created_by, created_on, _status, employee_id, notification_type, notification_reference_id, designation_mstr_id) FROM stdin;
    public          postgres    false    330   �       2          0    161759    tbl_on_reporting_leave_mstr 
   TABLE DATA           �   COPY public.tbl_on_reporting_leave_mstr (_id, reporting_head_designation_mstr_id, reporting_leave_designation_mstr_id, reporting_person_designation_mstr_id, _status, reporting_head_emp_mstr_id, reporting_person_emp_mstr_id) FROM stdin;
    public          postgres    false    332   e      4          0    161765    tbl_payment_mode_mstr 
   TABLE DATA           K   COPY public.tbl_payment_mode_mstr (_id, payment_mode, _status) FROM stdin;
    public          postgres    false    334   �      6          0    161772    tbl_project_mstr 
   TABLE DATA           �   COPY public.tbl_project_mstr (_id, project_name, project_short_name, project_description, latitude, longitude, project_location, _status, concept_type) FROM stdin;
    public          postgres    false    336         7          0    161785    tbl_project_mstr_address 
   TABLE DATA           e   COPY public.tbl_project_mstr_address (_id, project_mstr_id, _status, state_dist_city_id) FROM stdin;
    public          postgres    false    337   �      :          0    161793     tbl_project_ward_permission_mstr 
   TABLE DATA              COPY public.tbl_project_ward_permission_mstr (_id, emp_details_id, project_mstr_address_id, ward_mstr_id, _status) FROM stdin;
    public          postgres    false    340   E      <          0    161799    tbl_relation_mstr 
   TABLE DATA           F   COPY public.tbl_relation_mstr (_id, course_name, _status) FROM stdin;
    public          postgres    false    342   ~      >          0    161806    tbl_state_dist_city 
   TABLE DATA           E   COPY public.tbl_state_dist_city (_id, state, dist, city) FROM stdin;
    public          postgres    false    344   �      ?          0    161812    tbl_state_dist_city2 
   TABLE DATA           F   COPY public.tbl_state_dist_city2 (_id, state, dist, city) FROM stdin;
    public          postgres    false    345   6      B          0    161822    tbl_state_mstr 
   TABLE DATA           B   COPY public.tbl_state_mstr (_id, state_name, _status) FROM stdin;
    public          postgres    false    348   �e      D          0    161829    tbl_sub_course_mstr 
   TABLE DATA           X   COPY public.tbl_sub_course_mstr (_id, stream_name, course_mstr_id, _status) FROM stdin;
    public          postgres    false    350   Ef      F          0    161838    tbl_sub_item_name_mstr 
   TABLE DATA           �   COPY public.tbl_sub_item_name_mstr (_id, item_name_id, sub_item_name, _status, selling_rate, cgst_tax, sgst_tax, igst_tax) FROM stdin;
    public          postgres    false    352   �g      H          0    161845    tbl_sub_stream_mstr 
   TABLE DATA           p   COPY public.tbl_sub_stream_mstr (_id, course_mstr_id, sub_course_mstr_id, sub_stream_name, _status) FROM stdin;
    public          postgres    false    354   �i      J          0    161854    tbl_task_assign_details 
   TABLE DATA           �  COPY public.tbl_task_assign_details (_id, project_mstr_id, reassign_task_assign_details_id, assigned_emp_details_id, task_list_mstr_id, other_task, remarks_by_assigned, assign_date_time, deadline_date_time, complete_date_time, assign_by_user_mstr_id, assign_by_remarks, created_on, updated_on, receive_reject_status, receive_reject_date, not_approve_remark, approve_not_approve_date, _status, reject_re_assign_task, score) FROM stdin;
    public          postgres    false    356   �k      L          0    161866    tbl_task_mstr_list 
   TABLE DATA           c   COPY public.tbl_task_mstr_list (_id, project_mstr_id, task_name, description, _status) FROM stdin;
    public          postgres    false    358   #n      N          0    161877    tbl_task_workground_details 
   TABLE DATA           �   COPY public.tbl_task_workground_details (id, task_assigned_mstr_id, subtask_title, subtask_description, created_at, status, task_percent) FROM stdin;
    public          postgres    false    360   �n      P          0    161886    tbl_transaction 
   TABLE DATA           ^  COPY public.tbl_transaction (_id, payer_payee_id, generated_amt, payable_amt, due_amt, payment_mode_id, other_payment_mode, check_neft_bank_imps_no, cash_voucher_no, created_by, created_on, _status, emp_bank_details_id, asset_fine_charge, transaction_type, remarks, bank_name, payment_no, payment_date, transaction_date, project_mstr_id) FROM stdin;
    public          postgres    false    362   �q      R          0    161901    tbl_user_mstr 
   TABLE DATA           V   COPY public.tbl_user_mstr (_id, user_name, user_pass, pass_hint, _status) FROM stdin;
    public          postgres    false    364   к      T          0    161910    tbl_ward_mstr 
   TABLE DATA           T   COPY public.tbl_ward_mstr (_id, ward_name, _status, state_dist_city_id) FROM stdin;
    public          postgres    false    366   �      V          0    161917    tbl_work_performance_details 
   TABLE DATA           n   COPY public.tbl_work_performance_details (_id, quit_id, remarks, created_by, created_on, _status) FROM stdin;
    public          postgres    false    368   b�      �           0    0 *   tbl_account_income_expense_details__id_seq    SEQUENCE SET     Z   SELECT pg_catalog.setval('public.tbl_account_income_expense_details__id_seq', 792, true);
          public          postgres    false    203            �           0    0 +   tbl_asset_assigned_employee_details__id_seq    SEQUENCE SET     Z   SELECT pg_catalog.setval('public.tbl_asset_assigned_employee_details__id_seq', 41, true);
          public          postgres    false    205            �           0    0    tbl_asset_details__id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.tbl_asset_details__id_seq', 47, true);
          public          postgres    false    207            �           0    0 '   tbl_asset_inventory_details_user_id_seq    SEQUENCE SET     W   SELECT pg_catalog.setval('public.tbl_asset_inventory_details_user_id_seq', 100, true);
          public          postgres    false    209            �           0    0    tbl_asset_model_list__id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.tbl_asset_model_list__id_seq', 99, true);
          public          postgres    false    211            �           0    0    tbl_asset_model_no_mstr__id_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.tbl_asset_model_no_mstr__id_seq', 38, true);
          public          postgres    false    213            �           0    0 )   tbl_asset_model_repairing_details__id_seq    SEQUENCE SET     W   SELECT pg_catalog.setval('public.tbl_asset_model_repairing_details__id_seq', 4, true);
          public          postgres    false    215            �           0    0    tbl_candidate_details__id_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.tbl_candidate_details__id_seq', 241, true);
          public          postgres    false    217            �           0    0 &   tbl_candidate_document_details__id_seq    SEQUENCE SET     U   SELECT pg_catalog.setval('public.tbl_candidate_document_details__id_seq', 45, true);
          public          postgres    false    219            �           0    0 '   tbl_candidate_family_backbgound__id_seq    SEQUENCE SET     W   SELECT pg_catalog.setval('public.tbl_candidate_family_backbgound__id_seq', 232, true);
          public          postgres    false    221            �           0    0 3   tbl_candidate_first_round_interview_details__id_seq    SEQUENCE SET     b   SELECT pg_catalog.setval('public.tbl_candidate_first_round_interview_details__id_seq', 41, true);
          public          postgres    false    223            �           0    0 ,   tbl_candidate_interview_call_details__id_seq    SEQUENCE SET     [   SELECT pg_catalog.setval('public.tbl_candidate_interview_call_details__id_seq', 67, true);
          public          postgres    false    225            �           0    0 .   tbl_candidate_interview_result_details__id_seq    SEQUENCE SET     ]   SELECT pg_catalog.setval('public.tbl_candidate_interview_result_details__id_seq', 1, false);
          public          postgres    false    227            �           0    0 (   tbl_candidate_present_employment__id_seq    SEQUENCE SET     V   SELECT pg_catalog.setval('public.tbl_candidate_present_employment__id_seq', 5, true);
          public          postgres    false    229            �           0    0 1   tbl_candidate_previous_employment_details__id_seq    SEQUENCE SET     _   SELECT pg_catalog.setval('public.tbl_candidate_previous_employment_details__id_seq', 2, true);
          public          postgres    false    231            �           0    0 +   tbl_candidate_qualification_details__id_seq    SEQUENCE SET     [   SELECT pg_catalog.setval('public.tbl_candidate_qualification_details__id_seq', 453, true);
          public          postgres    false    233            �           0    0     tbl_candidate_references__id_seq    SEQUENCE SET     O   SELECT pg_catalog.setval('public.tbl_candidate_references__id_seq', 1, false);
          public          postgres    false    235            �           0    0 4   tbl_candidate_second_round_interview_details__id_seq    SEQUENCE SET     c   SELECT pg_catalog.setval('public.tbl_candidate_second_round_interview_details__id_seq', 31, true);
          public          postgres    false    237            �           0    0    tbl_collection__id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.tbl_collection__id_seq', 915, true);
          public          postgres    false    239            �           0    0    tbl_company_details__id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.tbl_company_details__id_seq', 1, true);
          public          postgres    false    241            �           0    0    tbl_company_location__id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tbl_company_location__id_seq', 8, true);
          public          postgres    false    243            �           0    0 "   tbl_contact_address_detail__id_seq    SEQUENCE SET     Q   SELECT pg_catalog.setval('public.tbl_contact_address_detail__id_seq', 39, true);
          public          postgres    false    245            �           0    0    tbl_contact_details__id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tbl_contact_details__id_seq', 35, true);
          public          postgres    false    247            �           0    0 !   tbl_contact_other_details__id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.tbl_contact_other_details__id_seq', 34, true);
          public          postgres    false    249            �           0    0    tbl_contact_type_mstr__id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.tbl_contact_type_mstr__id_seq', 5, true);
          public          postgres    false    251            �           0    0    tbl_course_mstr__id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.tbl_course_mstr__id_seq', 8, true);
          public          postgres    false    253            �           0    0    tbl_credit_note__id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.tbl_credit_note__id_seq', 57, true);
          public          postgres    false    255            �           0    0    tbl_creditnote_details__id_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.tbl_creditnote_details__id_seq', 57, true);
          public          postgres    false    257            �           0    0    tbl_deduction_mstr__id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.tbl_deduction_mstr__id_seq', 11, true);
          public          postgres    false    259            �           0    0    tbl_department_mstr__id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tbl_department_mstr__id_seq', 11, true);
          public          postgres    false    261            �           0    0    tbl_designation_mstr__id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.tbl_designation_mstr__id_seq', 42, true);
          public          postgres    false    263            �           0    0    tbl_doc_type_mstr__id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.tbl_doc_type_mstr__id_seq', 12, true);
          public          postgres    false    265            �           0    0    tbl_earning_mstr__id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.tbl_earning_mstr__id_seq', 16, true);
          public          postgres    false    267            �           0    0    tbl_emp_bank_details__id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.tbl_emp_bank_details__id_seq', 81, true);
          public          postgres    false    269            �           0    0    tbl_emp_details__id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.tbl_emp_details__id_seq', 112, true);
          public          postgres    false    271            �           0    0     tbl_emp_document_details__id_seq    SEQUENCE SET     O   SELECT pg_catalog.setval('public.tbl_emp_document_details__id_seq', 87, true);
          public          postgres    false    273            �           0    0 !   tbl_emp_family_backbgound__id_seq    SEQUENCE SET     Q   SELECT pg_catalog.setval('public.tbl_emp_family_backbgound__id_seq', 109, true);
          public          postgres    false    275            �           0    0 "   tbl_emp_present_employment__id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.tbl_emp_present_employment__id_seq', 2, true);
          public          postgres    false    277            �           0    0 +   tbl_emp_previous_employment_details__id_seq    SEQUENCE SET     Z   SELECT pg_catalog.setval('public.tbl_emp_previous_employment_details__id_seq', 35, true);
          public          postgres    false    279            �           0    0 %   tbl_emp_qualification_details__id_seq    SEQUENCE SET     U   SELECT pg_catalog.setval('public.tbl_emp_qualification_details__id_seq', 181, true);
          public          postgres    false    281            �           0    0    tbl_emp_references__id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.tbl_emp_references__id_seq', 1, true);
          public          postgres    false    283            �           0    0 !   tbl_employee_leave_detail__id_seq    SEQUENCE SET     O   SELECT pg_catalog.setval('public.tbl_employee_leave_detail__id_seq', 4, true);
          public          postgres    false    285            �           0    0 !   tbl_employee_quit_details__id_seq    SEQUENCE SET     Q   SELECT pg_catalog.setval('public.tbl_employee_quit_details__id_seq', 212, true);
          public          postgres    false    287            �           0    0     tbl_employment_type_mstr__id_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.tbl_employment_type_mstr__id_seq', 6, true);
          public          postgres    false    289            �           0    0    tbl_estimate__id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.tbl_estimate__id_seq', 40, true);
          public          postgres    false    291            �           0    0    tbl_estimate_details__id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.tbl_estimate_details__id_seq', 44, true);
          public          postgres    false    293            �           0    0    tbl_floor_mstr__id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.tbl_floor_mstr__id_seq', 7, true);
          public          postgres    false    295            �           0    0 #   tbl_generate_salary_details__id_seq    SEQUENCE SET     R   SELECT pg_catalog.setval('public.tbl_generate_salary_details__id_seq', 54, true);
          public          postgres    false    297            �           0    0    tbl_grade_mstr__id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.tbl_grade_mstr__id_seq', 7, true);
          public          postgres    false    299            �           0    0    tbl_interview_details__id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.tbl_interview_details__id_seq', 47, true);
          public          postgres    false    301            �           0    0 )   tbl_interview_interviewer_details__id_seq    SEQUENCE SET     Y   SELECT pg_catalog.setval('public.tbl_interview_interviewer_details__id_seq', 139, true);
          public          postgres    false    303            �           0    0 -   tbl_interview_job_description_details__id_seq    SEQUENCE SET     \   SELECT pg_catalog.setval('public.tbl_interview_job_description_details__id_seq', 1, false);
          public          postgres    false    305            �           0    0 #   tbl_interview_round_details__id_seq    SEQUENCE SET     S   SELECT pg_catalog.setval('public.tbl_interview_round_details__id_seq', 105, true);
          public          postgres    false    307            �           0    0    tbl_invoice__id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.tbl_invoice__id_seq', 66, true);
          public          postgres    false    309            �           0    0    tbl_invoice_details__id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tbl_invoice_details__id_seq', 76, true);
          public          postgres    false    311            �           0    0    tbl_item_name_mstr__id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.tbl_item_name_mstr__id_seq', 38, true);
          public          postgres    false    313            �           0    0    tbl_job_post_detail__id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tbl_job_post_detail__id_seq', 33, true);
          public          postgres    false    315            �           0    0 *   tbl_job_post_qualification_details__id_seq    SEQUENCE SET     Y   SELECT pg_catalog.setval('public.tbl_job_post_qualification_details__id_seq', 37, true);
          public          postgres    false    317            �           0    0    tbl_leave__id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.tbl_leave__id_seq', 1, false);
          public          postgres    false    319            �           0    0    tbl_leave_mstr__id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.tbl_leave_mstr__id_seq', 1, true);
          public          postgres    false    321            �           0    0    tbl_leave_type_mstr__id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tbl_leave_type_mstr__id_seq', 12, true);
          public          postgres    false    323            �           0    0    tbl_login_details__id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tbl_login_details__id_seq', 3493, true);
          public          postgres    false    325            �           0    0    tbl_menu_permission__id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tbl_menu_permission__id_seq', 85, true);
          public          postgres    false    328            �           0    0    tbl_menu_permission__id_seq1    SEQUENCE SET     L   SELECT pg_catalog.setval('public.tbl_menu_permission__id_seq1', 725, true);
          public          postgres    false    329            �           0    0    tbl_notification_detail__id_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.tbl_notification_detail__id_seq', 34, true);
          public          postgres    false    331            �           0    0 #   tbl_on_reporting_leave_mstr__id_seq    SEQUENCE SET     Q   SELECT pg_catalog.setval('public.tbl_on_reporting_leave_mstr__id_seq', 7, true);
          public          postgres    false    333            �           0    0    tbl_payment_mode_mstr__id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.tbl_payment_mode_mstr__id_seq', 7, true);
          public          postgres    false    335            �           0    0 !   tbl_project_mstr__address__id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.tbl_project_mstr__address__id_seq', 25, true);
          public          postgres    false    338            �           0    0    tbl_project_mstr__id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.tbl_project_mstr__id_seq', 19, true);
          public          postgres    false    339            �           0    0 (   tbl_project_ward_permission_mstr__id_seq    SEQUENCE SET     V   SELECT pg_catalog.setval('public.tbl_project_ward_permission_mstr__id_seq', 5, true);
          public          postgres    false    341            �           0    0    tbl_relation_mstr__id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.tbl_relation_mstr__id_seq', 5, true);
          public          postgres    false    343            �           0    0    tbl_state_dist_city2__id_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.tbl_state_dist_city2__id_seq', 1108, true);
          public          postgres    false    346            �           0    0    tbl_state_dist_city__id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.tbl_state_dist_city__id_seq', 1119, true);
          public          postgres    false    347            �           0    0    tbl_state_mstr__id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.tbl_state_mstr__id_seq', 4, true);
          public          postgres    false    349            �           0    0    tbl_sub_course_mstr__id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tbl_sub_course_mstr__id_seq', 46, true);
          public          postgres    false    351            �           0    0    tbl_sub_item_name_mstr__id_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.tbl_sub_item_name_mstr__id_seq', 37, true);
          public          postgres    false    353            �           0    0    tbl_sub_stream_mstr__id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.tbl_sub_stream_mstr__id_seq', 43, true);
          public          postgres    false    355            �           0    0    tbl_task_assign_details__id_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.tbl_task_assign_details__id_seq', 10, true);
          public          postgres    false    357                        0    0    tbl_task_mstr_list__id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.tbl_task_mstr_list__id_seq', 4, true);
          public          postgres    false    359                       0    0 "   tbl_task_workground_details_id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.tbl_task_workground_details_id_seq', 6, true);
          public          postgres    false    361                       0    0    tbl_transaction__id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.tbl_transaction__id_seq', 931, true);
          public          postgres    false    363                       0    0    tbl_user_mstr__id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.tbl_user_mstr__id_seq', 98, true);
          public          postgres    false    365                       0    0    tbl_ward_mstr__id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.tbl_ward_mstr__id_seq', 5, true);
          public          postgres    false    367                       0    0 (   tbl_work_performance_details_user_id_seq    SEQUENCE SET     W   SELECT pg_catalog.setval('public.tbl_work_performance_details_user_id_seq', 33, true);
          public          postgres    false    369            �           2606    162011 J   tbl_account_income_expense_details tbl_account_income_expense_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_account_income_expense_details
    ADD CONSTRAINT tbl_account_income_expense_details_pkey PRIMARY KEY (_id);
 t   ALTER TABLE ONLY public.tbl_account_income_expense_details DROP CONSTRAINT tbl_account_income_expense_details_pkey;
       public            postgres    false    202            �           2606    162013 L   tbl_asset_assigned_employee_details tbl_asset_assigned_employee_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_asset_assigned_employee_details
    ADD CONSTRAINT tbl_asset_assigned_employee_details_pkey PRIMARY KEY (_id);
 v   ALTER TABLE ONLY public.tbl_asset_assigned_employee_details DROP CONSTRAINT tbl_asset_assigned_employee_details_pkey;
       public            postgres    false    204            �           2606    162015 (   tbl_asset_details tbl_asset_details_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY public.tbl_asset_details
    ADD CONSTRAINT tbl_asset_details_pkey PRIMARY KEY (_id);
 R   ALTER TABLE ONLY public.tbl_asset_details DROP CONSTRAINT tbl_asset_details_pkey;
       public            postgres    false    206            �           2606    162017 <   tbl_asset_inventory_details tbl_asset_inventory_details_pkey 
   CONSTRAINT     {   ALTER TABLE ONLY public.tbl_asset_inventory_details
    ADD CONSTRAINT tbl_asset_inventory_details_pkey PRIMARY KEY (_id);
 f   ALTER TABLE ONLY public.tbl_asset_inventory_details DROP CONSTRAINT tbl_asset_inventory_details_pkey;
       public            postgres    false    208            �           2606    162019 .   tbl_asset_model_list tbl_asset_model_list_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.tbl_asset_model_list
    ADD CONSTRAINT tbl_asset_model_list_pkey PRIMARY KEY (_id);
 X   ALTER TABLE ONLY public.tbl_asset_model_list DROP CONSTRAINT tbl_asset_model_list_pkey;
       public            postgres    false    210            �           2606    162021 4   tbl_asset_model_no_mstr tbl_asset_model_no_mstr_pkey 
   CONSTRAINT     s   ALTER TABLE ONLY public.tbl_asset_model_no_mstr
    ADD CONSTRAINT tbl_asset_model_no_mstr_pkey PRIMARY KEY (_id);
 ^   ALTER TABLE ONLY public.tbl_asset_model_no_mstr DROP CONSTRAINT tbl_asset_model_no_mstr_pkey;
       public            postgres    false    212            �           2606    162023 H   tbl_asset_model_repairing_details tbl_asset_model_repairing_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_asset_model_repairing_details
    ADD CONSTRAINT tbl_asset_model_repairing_details_pkey PRIMARY KEY (_id);
 r   ALTER TABLE ONLY public.tbl_asset_model_repairing_details DROP CONSTRAINT tbl_asset_model_repairing_details_pkey;
       public            postgres    false    214            �           2606    162025 0   tbl_candidate_details tbl_candidate_details_pkey 
   CONSTRAINT     o   ALTER TABLE ONLY public.tbl_candidate_details
    ADD CONSTRAINT tbl_candidate_details_pkey PRIMARY KEY (_id);
 Z   ALTER TABLE ONLY public.tbl_candidate_details DROP CONSTRAINT tbl_candidate_details_pkey;
       public            postgres    false    216            �           2606    162027 B   tbl_candidate_document_details tbl_candidate_document_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_candidate_document_details
    ADD CONSTRAINT tbl_candidate_document_details_pkey PRIMARY KEY (_id);
 l   ALTER TABLE ONLY public.tbl_candidate_document_details DROP CONSTRAINT tbl_candidate_document_details_pkey;
       public            postgres    false    218            �           2606    162029 D   tbl_candidate_family_backbgound tbl_candidate_family_backbgound_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_candidate_family_backbgound
    ADD CONSTRAINT tbl_candidate_family_backbgound_pkey PRIMARY KEY (_id);
 n   ALTER TABLE ONLY public.tbl_candidate_family_backbgound DROP CONSTRAINT tbl_candidate_family_backbgound_pkey;
       public            postgres    false    220            �           2606    162031 \   tbl_candidate_first_round_interview_details tbl_candidate_first_round_interview_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_candidate_first_round_interview_details
    ADD CONSTRAINT tbl_candidate_first_round_interview_details_pkey PRIMARY KEY (_id);
 �   ALTER TABLE ONLY public.tbl_candidate_first_round_interview_details DROP CONSTRAINT tbl_candidate_first_round_interview_details_pkey;
       public            postgres    false    222            �           2606    162033 N   tbl_candidate_interview_call_details tbl_candidate_interview_call_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_candidate_interview_call_details
    ADD CONSTRAINT tbl_candidate_interview_call_details_pkey PRIMARY KEY (_id);
 x   ALTER TABLE ONLY public.tbl_candidate_interview_call_details DROP CONSTRAINT tbl_candidate_interview_call_details_pkey;
       public            postgres    false    224            �           2606    162035 R   tbl_candidate_interview_result_details tbl_candidate_interview_result_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_candidate_interview_result_details
    ADD CONSTRAINT tbl_candidate_interview_result_details_pkey PRIMARY KEY (_id);
 |   ALTER TABLE ONLY public.tbl_candidate_interview_result_details DROP CONSTRAINT tbl_candidate_interview_result_details_pkey;
       public            postgres    false    226            �           2606    162037 F   tbl_candidate_present_employment tbl_candidate_present_employment_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_candidate_present_employment
    ADD CONSTRAINT tbl_candidate_present_employment_pkey PRIMARY KEY (_id);
 p   ALTER TABLE ONLY public.tbl_candidate_present_employment DROP CONSTRAINT tbl_candidate_present_employment_pkey;
       public            postgres    false    228            �           2606    162039 X   tbl_candidate_previous_employment_details tbl_candidate_previous_employment_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_candidate_previous_employment_details
    ADD CONSTRAINT tbl_candidate_previous_employment_details_pkey PRIMARY KEY (_id);
 �   ALTER TABLE ONLY public.tbl_candidate_previous_employment_details DROP CONSTRAINT tbl_candidate_previous_employment_details_pkey;
       public            postgres    false    230            �           2606    162041 L   tbl_candidate_qualification_details tbl_candidate_qualification_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_candidate_qualification_details
    ADD CONSTRAINT tbl_candidate_qualification_details_pkey PRIMARY KEY (_id);
 v   ALTER TABLE ONLY public.tbl_candidate_qualification_details DROP CONSTRAINT tbl_candidate_qualification_details_pkey;
       public            postgres    false    232            �           2606    162043 6   tbl_candidate_references tbl_candidate_references_pkey 
   CONSTRAINT     u   ALTER TABLE ONLY public.tbl_candidate_references
    ADD CONSTRAINT tbl_candidate_references_pkey PRIMARY KEY (_id);
 `   ALTER TABLE ONLY public.tbl_candidate_references DROP CONSTRAINT tbl_candidate_references_pkey;
       public            postgres    false    234            �           2606    162045 ^   tbl_candidate_second_round_interview_details tbl_candidate_second_round_interview_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_candidate_second_round_interview_details
    ADD CONSTRAINT tbl_candidate_second_round_interview_details_pkey PRIMARY KEY (_id);
 �   ALTER TABLE ONLY public.tbl_candidate_second_round_interview_details DROP CONSTRAINT tbl_candidate_second_round_interview_details_pkey;
       public            postgres    false    236            �           2606    162047 "   tbl_collection tbl_collection_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.tbl_collection
    ADD CONSTRAINT tbl_collection_pkey PRIMARY KEY (_id);
 L   ALTER TABLE ONLY public.tbl_collection DROP CONSTRAINT tbl_collection_pkey;
       public            postgres    false    238            �           2606    162049 ,   tbl_company_details tbl_company_details_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.tbl_company_details
    ADD CONSTRAINT tbl_company_details_pkey PRIMARY KEY (_id);
 V   ALTER TABLE ONLY public.tbl_company_details DROP CONSTRAINT tbl_company_details_pkey;
       public            postgres    false    240            �           2606    162051 .   tbl_company_location tbl_company_location_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.tbl_company_location
    ADD CONSTRAINT tbl_company_location_pkey PRIMARY KEY (_id);
 X   ALTER TABLE ONLY public.tbl_company_location DROP CONSTRAINT tbl_company_location_pkey;
       public            postgres    false    242            �           2606    162053 :   tbl_contact_address_detail tbl_contact_address_detail_pkey 
   CONSTRAINT     y   ALTER TABLE ONLY public.tbl_contact_address_detail
    ADD CONSTRAINT tbl_contact_address_detail_pkey PRIMARY KEY (_id);
 d   ALTER TABLE ONLY public.tbl_contact_address_detail DROP CONSTRAINT tbl_contact_address_detail_pkey;
       public            postgres    false    244            �           2606    162055 ,   tbl_contact_details tbl_contact_details_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.tbl_contact_details
    ADD CONSTRAINT tbl_contact_details_pkey PRIMARY KEY (_id);
 V   ALTER TABLE ONLY public.tbl_contact_details DROP CONSTRAINT tbl_contact_details_pkey;
       public            postgres    false    246            �           2606    162057 8   tbl_contact_other_details tbl_contact_other_details_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY public.tbl_contact_other_details
    ADD CONSTRAINT tbl_contact_other_details_pkey PRIMARY KEY (_id);
 b   ALTER TABLE ONLY public.tbl_contact_other_details DROP CONSTRAINT tbl_contact_other_details_pkey;
       public            postgres    false    248            �           2606    162059 0   tbl_contact_type_mstr tbl_contact_type_mstr_pkey 
   CONSTRAINT     o   ALTER TABLE ONLY public.tbl_contact_type_mstr
    ADD CONSTRAINT tbl_contact_type_mstr_pkey PRIMARY KEY (_id);
 Z   ALTER TABLE ONLY public.tbl_contact_type_mstr DROP CONSTRAINT tbl_contact_type_mstr_pkey;
       public            postgres    false    250            �           2606    162061 $   tbl_course_mstr tbl_course_mstr_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.tbl_course_mstr
    ADD CONSTRAINT tbl_course_mstr_pkey PRIMARY KEY (_id);
 N   ALTER TABLE ONLY public.tbl_course_mstr DROP CONSTRAINT tbl_course_mstr_pkey;
       public            postgres    false    252            �           2606    162063 *   tbl_deduction_mstr tbl_deduction_mstr_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.tbl_deduction_mstr
    ADD CONSTRAINT tbl_deduction_mstr_pkey PRIMARY KEY (_id);
 T   ALTER TABLE ONLY public.tbl_deduction_mstr DROP CONSTRAINT tbl_deduction_mstr_pkey;
       public            postgres    false    258            �           2606    162065 ,   tbl_department_mstr tbl_department_mstr_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.tbl_department_mstr
    ADD CONSTRAINT tbl_department_mstr_pkey PRIMARY KEY (_id);
 V   ALTER TABLE ONLY public.tbl_department_mstr DROP CONSTRAINT tbl_department_mstr_pkey;
       public            postgres    false    260            �           2606    162067 .   tbl_designation_mstr tbl_designation_mstr_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.tbl_designation_mstr
    ADD CONSTRAINT tbl_designation_mstr_pkey PRIMARY KEY (_id);
 X   ALTER TABLE ONLY public.tbl_designation_mstr DROP CONSTRAINT tbl_designation_mstr_pkey;
       public            postgres    false    262            �           2606    162069 (   tbl_doc_type_mstr tbl_doc_type_mstr_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY public.tbl_doc_type_mstr
    ADD CONSTRAINT tbl_doc_type_mstr_pkey PRIMARY KEY (_id);
 R   ALTER TABLE ONLY public.tbl_doc_type_mstr DROP CONSTRAINT tbl_doc_type_mstr_pkey;
       public            postgres    false    264            �           2606    162071 &   tbl_earning_mstr tbl_earning_mstr_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.tbl_earning_mstr
    ADD CONSTRAINT tbl_earning_mstr_pkey PRIMARY KEY (_id);
 P   ALTER TABLE ONLY public.tbl_earning_mstr DROP CONSTRAINT tbl_earning_mstr_pkey;
       public            postgres    false    266            �           2606    162073 .   tbl_emp_bank_details tbl_emp_bank_details_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.tbl_emp_bank_details
    ADD CONSTRAINT tbl_emp_bank_details_pkey PRIMARY KEY (_id);
 X   ALTER TABLE ONLY public.tbl_emp_bank_details DROP CONSTRAINT tbl_emp_bank_details_pkey;
       public            postgres    false    268            �           2606    162075 $   tbl_emp_details tbl_emp_details_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.tbl_emp_details
    ADD CONSTRAINT tbl_emp_details_pkey PRIMARY KEY (_id);
 N   ALTER TABLE ONLY public.tbl_emp_details DROP CONSTRAINT tbl_emp_details_pkey;
       public            postgres    false    270            �           2606    162077 6   tbl_emp_document_details tbl_emp_document_details_pkey 
   CONSTRAINT     u   ALTER TABLE ONLY public.tbl_emp_document_details
    ADD CONSTRAINT tbl_emp_document_details_pkey PRIMARY KEY (_id);
 `   ALTER TABLE ONLY public.tbl_emp_document_details DROP CONSTRAINT tbl_emp_document_details_pkey;
       public            postgres    false    272            �           2606    162079 8   tbl_emp_family_backbgound tbl_emp_family_backbgound_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY public.tbl_emp_family_backbgound
    ADD CONSTRAINT tbl_emp_family_backbgound_pkey PRIMARY KEY (_id);
 b   ALTER TABLE ONLY public.tbl_emp_family_backbgound DROP CONSTRAINT tbl_emp_family_backbgound_pkey;
       public            postgres    false    274            �           2606    162081 :   tbl_emp_present_employment tbl_emp_present_employment_pkey 
   CONSTRAINT     y   ALTER TABLE ONLY public.tbl_emp_present_employment
    ADD CONSTRAINT tbl_emp_present_employment_pkey PRIMARY KEY (_id);
 d   ALTER TABLE ONLY public.tbl_emp_present_employment DROP CONSTRAINT tbl_emp_present_employment_pkey;
       public            postgres    false    276            �           2606    162083 L   tbl_emp_previous_employment_details tbl_emp_previous_employment_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_emp_previous_employment_details
    ADD CONSTRAINT tbl_emp_previous_employment_details_pkey PRIMARY KEY (_id);
 v   ALTER TABLE ONLY public.tbl_emp_previous_employment_details DROP CONSTRAINT tbl_emp_previous_employment_details_pkey;
       public            postgres    false    278            �           2606    162085 @   tbl_emp_qualification_details tbl_emp_qualification_details_pkey 
   CONSTRAINT        ALTER TABLE ONLY public.tbl_emp_qualification_details
    ADD CONSTRAINT tbl_emp_qualification_details_pkey PRIMARY KEY (_id);
 j   ALTER TABLE ONLY public.tbl_emp_qualification_details DROP CONSTRAINT tbl_emp_qualification_details_pkey;
       public            postgres    false    280            �           2606    162087 *   tbl_emp_references tbl_emp_references_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.tbl_emp_references
    ADD CONSTRAINT tbl_emp_references_pkey PRIMARY KEY (_id);
 T   ALTER TABLE ONLY public.tbl_emp_references DROP CONSTRAINT tbl_emp_references_pkey;
       public            postgres    false    282            �           2606    162089 8   tbl_employee_leave_detail tbl_employee_leave_detail_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY public.tbl_employee_leave_detail
    ADD CONSTRAINT tbl_employee_leave_detail_pkey PRIMARY KEY (_id);
 b   ALTER TABLE ONLY public.tbl_employee_leave_detail DROP CONSTRAINT tbl_employee_leave_detail_pkey;
       public            postgres    false    284            �           2606    162091 8   tbl_employee_quit_details tbl_employee_quit_details_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY public.tbl_employee_quit_details
    ADD CONSTRAINT tbl_employee_quit_details_pkey PRIMARY KEY (_id);
 b   ALTER TABLE ONLY public.tbl_employee_quit_details DROP CONSTRAINT tbl_employee_quit_details_pkey;
       public            postgres    false    286            �           2606    162093 6   tbl_employment_type_mstr tbl_employment_type_mstr_pkey 
   CONSTRAINT     u   ALTER TABLE ONLY public.tbl_employment_type_mstr
    ADD CONSTRAINT tbl_employment_type_mstr_pkey PRIMARY KEY (_id);
 `   ALTER TABLE ONLY public.tbl_employment_type_mstr DROP CONSTRAINT tbl_employment_type_mstr_pkey;
       public            postgres    false    288            �           2606    162095 .   tbl_estimate_details tbl_estimate_details_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.tbl_estimate_details
    ADD CONSTRAINT tbl_estimate_details_pkey PRIMARY KEY (_id);
 X   ALTER TABLE ONLY public.tbl_estimate_details DROP CONSTRAINT tbl_estimate_details_pkey;
       public            postgres    false    292            �           2606    162097    tbl_estimate tbl_estimate_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.tbl_estimate
    ADD CONSTRAINT tbl_estimate_pkey PRIMARY KEY (_id);
 H   ALTER TABLE ONLY public.tbl_estimate DROP CONSTRAINT tbl_estimate_pkey;
       public            postgres    false    290            �           2606    162099 "   tbl_floor_mstr tbl_floor_mstr_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.tbl_floor_mstr
    ADD CONSTRAINT tbl_floor_mstr_pkey PRIMARY KEY (_id);
 L   ALTER TABLE ONLY public.tbl_floor_mstr DROP CONSTRAINT tbl_floor_mstr_pkey;
       public            postgres    false    294            �           2606    162101 <   tbl_generate_salary_details tbl_generate_salary_details_pkey 
   CONSTRAINT     {   ALTER TABLE ONLY public.tbl_generate_salary_details
    ADD CONSTRAINT tbl_generate_salary_details_pkey PRIMARY KEY (_id);
 f   ALTER TABLE ONLY public.tbl_generate_salary_details DROP CONSTRAINT tbl_generate_salary_details_pkey;
       public            postgres    false    296            �           2606    162103 "   tbl_grade_mstr tbl_grade_mstr_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.tbl_grade_mstr
    ADD CONSTRAINT tbl_grade_mstr_pkey PRIMARY KEY (_id);
 L   ALTER TABLE ONLY public.tbl_grade_mstr DROP CONSTRAINT tbl_grade_mstr_pkey;
       public            postgres    false    298            �           2606    162105 0   tbl_interview_details tbl_interview_details_pkey 
   CONSTRAINT     o   ALTER TABLE ONLY public.tbl_interview_details
    ADD CONSTRAINT tbl_interview_details_pkey PRIMARY KEY (_id);
 Z   ALTER TABLE ONLY public.tbl_interview_details DROP CONSTRAINT tbl_interview_details_pkey;
       public            postgres    false    300            �           2606    162107 H   tbl_interview_interviewer_details tbl_interview_interviewer_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_interview_interviewer_details
    ADD CONSTRAINT tbl_interview_interviewer_details_pkey PRIMARY KEY (_id);
 r   ALTER TABLE ONLY public.tbl_interview_interviewer_details DROP CONSTRAINT tbl_interview_interviewer_details_pkey;
       public            postgres    false    302            �           2606    162109 P   tbl_interview_job_description_details tbl_interview_job_description_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_interview_job_description_details
    ADD CONSTRAINT tbl_interview_job_description_details_pkey PRIMARY KEY (_id);
 z   ALTER TABLE ONLY public.tbl_interview_job_description_details DROP CONSTRAINT tbl_interview_job_description_details_pkey;
       public            postgres    false    304            �           2606    162111 <   tbl_interview_round_details tbl_interview_round_details_pkey 
   CONSTRAINT     {   ALTER TABLE ONLY public.tbl_interview_round_details
    ADD CONSTRAINT tbl_interview_round_details_pkey PRIMARY KEY (_id);
 f   ALTER TABLE ONLY public.tbl_interview_round_details DROP CONSTRAINT tbl_interview_round_details_pkey;
       public            postgres    false    306            �           2606    162113 ,   tbl_invoice_details tbl_invoice_details_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.tbl_invoice_details
    ADD CONSTRAINT tbl_invoice_details_pkey PRIMARY KEY (_id);
 V   ALTER TABLE ONLY public.tbl_invoice_details DROP CONSTRAINT tbl_invoice_details_pkey;
       public            postgres    false    310            �           2606    162115    tbl_invoice tbl_invoice_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.tbl_invoice
    ADD CONSTRAINT tbl_invoice_pkey PRIMARY KEY (_id);
 F   ALTER TABLE ONLY public.tbl_invoice DROP CONSTRAINT tbl_invoice_pkey;
       public            postgres    false    308            �           2606    162117 *   tbl_item_name_mstr tbl_item_name_mstr_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.tbl_item_name_mstr
    ADD CONSTRAINT tbl_item_name_mstr_pkey PRIMARY KEY (_id);
 T   ALTER TABLE ONLY public.tbl_item_name_mstr DROP CONSTRAINT tbl_item_name_mstr_pkey;
       public            postgres    false    312            �           2606    162119 ,   tbl_job_post_detail tbl_job_post_detail_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.tbl_job_post_detail
    ADD CONSTRAINT tbl_job_post_detail_pkey PRIMARY KEY (_id);
 V   ALTER TABLE ONLY public.tbl_job_post_detail DROP CONSTRAINT tbl_job_post_detail_pkey;
       public            postgres    false    314                        2606    162121 J   tbl_job_post_qualification_details tbl_job_post_qualification_details_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_job_post_qualification_details
    ADD CONSTRAINT tbl_job_post_qualification_details_pkey PRIMARY KEY (_id);
 t   ALTER TABLE ONLY public.tbl_job_post_qualification_details DROP CONSTRAINT tbl_job_post_qualification_details_pkey;
       public            postgres    false    316                       2606    162123 "   tbl_leave_mstr tbl_leave_mstr_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.tbl_leave_mstr
    ADD CONSTRAINT tbl_leave_mstr_pkey PRIMARY KEY (_id);
 L   ALTER TABLE ONLY public.tbl_leave_mstr DROP CONSTRAINT tbl_leave_mstr_pkey;
       public            postgres    false    320                       2606    162125    tbl_leave tbl_leave_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.tbl_leave
    ADD CONSTRAINT tbl_leave_pkey PRIMARY KEY (_id);
 B   ALTER TABLE ONLY public.tbl_leave DROP CONSTRAINT tbl_leave_pkey;
       public            postgres    false    318                       2606    162127 ,   tbl_leave_type_mstr tbl_leave_type_mstr_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.tbl_leave_type_mstr
    ADD CONSTRAINT tbl_leave_type_mstr_pkey PRIMARY KEY (_id);
 V   ALTER TABLE ONLY public.tbl_leave_type_mstr DROP CONSTRAINT tbl_leave_type_mstr_pkey;
       public            postgres    false    322                       2606    162129 (   tbl_login_details tbl_login_details_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY public.tbl_login_details
    ADD CONSTRAINT tbl_login_details_pkey PRIMARY KEY (_id);
 R   ALTER TABLE ONLY public.tbl_login_details DROP CONSTRAINT tbl_login_details_pkey;
       public            postgres    false    324            
           2606    162131 &   tbl_menu_mstr tbl_menu_permission_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.tbl_menu_mstr
    ADD CONSTRAINT tbl_menu_permission_pkey PRIMARY KEY (_id);
 P   ALTER TABLE ONLY public.tbl_menu_mstr DROP CONSTRAINT tbl_menu_permission_pkey;
       public            postgres    false    326                       2606    162133 -   tbl_menu_permission tbl_menu_permission_pkey1 
   CONSTRAINT     l   ALTER TABLE ONLY public.tbl_menu_permission
    ADD CONSTRAINT tbl_menu_permission_pkey1 PRIMARY KEY (_id);
 W   ALTER TABLE ONLY public.tbl_menu_permission DROP CONSTRAINT tbl_menu_permission_pkey1;
       public            postgres    false    327                       2606    162135 4   tbl_notification_detail tbl_notification_detail_pkey 
   CONSTRAINT     s   ALTER TABLE ONLY public.tbl_notification_detail
    ADD CONSTRAINT tbl_notification_detail_pkey PRIMARY KEY (_id);
 ^   ALTER TABLE ONLY public.tbl_notification_detail DROP CONSTRAINT tbl_notification_detail_pkey;
       public            postgres    false    330                       2606    162137 <   tbl_on_reporting_leave_mstr tbl_on_reporting_leave_mstr_pkey 
   CONSTRAINT     {   ALTER TABLE ONLY public.tbl_on_reporting_leave_mstr
    ADD CONSTRAINT tbl_on_reporting_leave_mstr_pkey PRIMARY KEY (_id);
 f   ALTER TABLE ONLY public.tbl_on_reporting_leave_mstr DROP CONSTRAINT tbl_on_reporting_leave_mstr_pkey;
       public            postgres    false    332                       2606    162139 0   tbl_payment_mode_mstr tbl_payment_mode_mstr_pkey 
   CONSTRAINT     o   ALTER TABLE ONLY public.tbl_payment_mode_mstr
    ADD CONSTRAINT tbl_payment_mode_mstr_pkey PRIMARY KEY (_id);
 Z   ALTER TABLE ONLY public.tbl_payment_mode_mstr DROP CONSTRAINT tbl_payment_mode_mstr_pkey;
       public            postgres    false    334                       2606    162141 7   tbl_project_mstr_address tbl_project_mstr__address_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.tbl_project_mstr_address
    ADD CONSTRAINT tbl_project_mstr__address_pkey PRIMARY KEY (_id);
 a   ALTER TABLE ONLY public.tbl_project_mstr_address DROP CONSTRAINT tbl_project_mstr__address_pkey;
       public            postgres    false    337                       2606    162143 &   tbl_project_mstr tbl_project_mstr_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.tbl_project_mstr
    ADD CONSTRAINT tbl_project_mstr_pkey PRIMARY KEY (_id);
 P   ALTER TABLE ONLY public.tbl_project_mstr DROP CONSTRAINT tbl_project_mstr_pkey;
       public            postgres    false    336                       2606    162145 F   tbl_project_ward_permission_mstr tbl_project_ward_permission_mstr_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tbl_project_ward_permission_mstr
    ADD CONSTRAINT tbl_project_ward_permission_mstr_pkey PRIMARY KEY (_id);
 p   ALTER TABLE ONLY public.tbl_project_ward_permission_mstr DROP CONSTRAINT tbl_project_ward_permission_mstr_pkey;
       public            postgres    false    340                       2606    162147 (   tbl_relation_mstr tbl_relation_mstr_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY public.tbl_relation_mstr
    ADD CONSTRAINT tbl_relation_mstr_pkey PRIMARY KEY (_id);
 R   ALTER TABLE ONLY public.tbl_relation_mstr DROP CONSTRAINT tbl_relation_mstr_pkey;
       public            postgres    false    342                       2606    162149 .   tbl_state_dist_city2 tbl_state_dist_city2_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.tbl_state_dist_city2
    ADD CONSTRAINT tbl_state_dist_city2_pkey PRIMARY KEY (_id);
 X   ALTER TABLE ONLY public.tbl_state_dist_city2 DROP CONSTRAINT tbl_state_dist_city2_pkey;
       public            postgres    false    345                       2606    162151 ,   tbl_state_dist_city tbl_state_dist_city_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.tbl_state_dist_city
    ADD CONSTRAINT tbl_state_dist_city_pkey PRIMARY KEY (_id);
 V   ALTER TABLE ONLY public.tbl_state_dist_city DROP CONSTRAINT tbl_state_dist_city_pkey;
       public            postgres    false    344                        2606    162153 "   tbl_state_mstr tbl_state_mstr_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.tbl_state_mstr
    ADD CONSTRAINT tbl_state_mstr_pkey PRIMARY KEY (_id);
 L   ALTER TABLE ONLY public.tbl_state_mstr DROP CONSTRAINT tbl_state_mstr_pkey;
       public            postgres    false    348            "           2606    162155 2   tbl_sub_item_name_mstr tbl_sub_item_name_mstr_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.tbl_sub_item_name_mstr
    ADD CONSTRAINT tbl_sub_item_name_mstr_pkey PRIMARY KEY (_id);
 \   ALTER TABLE ONLY public.tbl_sub_item_name_mstr DROP CONSTRAINT tbl_sub_item_name_mstr_pkey;
       public            postgres    false    352            $           2606    162157 4   tbl_task_assign_details tbl_task_assign_details_pkey 
   CONSTRAINT     s   ALTER TABLE ONLY public.tbl_task_assign_details
    ADD CONSTRAINT tbl_task_assign_details_pkey PRIMARY KEY (_id);
 ^   ALTER TABLE ONLY public.tbl_task_assign_details DROP CONSTRAINT tbl_task_assign_details_pkey;
       public            postgres    false    356            &           2606    162159 *   tbl_task_mstr_list tbl_task_mstr_list_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.tbl_task_mstr_list
    ADD CONSTRAINT tbl_task_mstr_list_pkey PRIMARY KEY (_id);
 T   ALTER TABLE ONLY public.tbl_task_mstr_list DROP CONSTRAINT tbl_task_mstr_list_pkey;
       public            postgres    false    358            (           2606    162161 <   tbl_task_workground_details tbl_task_workground_details_pkey 
   CONSTRAINT     z   ALTER TABLE ONLY public.tbl_task_workground_details
    ADD CONSTRAINT tbl_task_workground_details_pkey PRIMARY KEY (id);
 f   ALTER TABLE ONLY public.tbl_task_workground_details DROP CONSTRAINT tbl_task_workground_details_pkey;
       public            postgres    false    360            *           2606    162163 $   tbl_transaction tbl_transaction_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.tbl_transaction
    ADD CONSTRAINT tbl_transaction_pkey PRIMARY KEY (_id);
 N   ALTER TABLE ONLY public.tbl_transaction DROP CONSTRAINT tbl_transaction_pkey;
       public            postgres    false    362            ,           2606    162165     tbl_user_mstr tbl_user_mstr_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.tbl_user_mstr
    ADD CONSTRAINT tbl_user_mstr_pkey PRIMARY KEY (_id);
 J   ALTER TABLE ONLY public.tbl_user_mstr DROP CONSTRAINT tbl_user_mstr_pkey;
       public            postgres    false    364            .           2606    162167     tbl_ward_mstr tbl_ward_mstr_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.tbl_ward_mstr
    ADD CONSTRAINT tbl_ward_mstr_pkey PRIMARY KEY (_id);
 J   ALTER TABLE ONLY public.tbl_ward_mstr DROP CONSTRAINT tbl_ward_mstr_pkey;
       public            postgres    false    366            0           2606    162169 >   tbl_work_performance_details tbl_work_performance_details_pkey 
   CONSTRAINT     }   ALTER TABLE ONLY public.tbl_work_performance_details
    ADD CONSTRAINT tbl_work_performance_details_pkey PRIMARY KEY (_id);
 h   ALTER TABLE ONLY public.tbl_work_performance_details DROP CONSTRAINT tbl_work_performance_details_pkey;
       public            postgres    false    368            1           2606    162170 0   tbl_leave_mstr tbl_leave_mstr_leave_type_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.tbl_leave_mstr
    ADD CONSTRAINT tbl_leave_mstr_leave_type_id_fkey FOREIGN KEY (leave_type_id) REFERENCES public.tbl_leave_type_mstr(_id);
 Z   ALTER TABLE ONLY public.tbl_leave_mstr DROP CONSTRAINT tbl_leave_mstr_leave_type_id_fkey;
       public          postgres    false    322    320    3846            �      x���ߋ$Gv��{����FdFč�l?�J�j��Ȟ��Ċ]��}��'*c��έ����`{���8�#��������?|��0=�)Lo��v��9?I~��a~���?>���_.�쟟������������oq�������a����f^9�<������y��/?����߾|���;O0n�0`~��'��nK�Kʛ9/<��I���o����iQR�Hi~ھ��G�
�*.r�<y�c� %��'��V�#/NʓW���ކEӸ>�|�'��/����KS�I��tl���8�GV^���)l0�a��sMzy����~���O�^������~~�����w߿�����:GᆐY?hyx������'%y=l���������~���>�{����ǟ?}���O��l����[��R"��ͧo�~���/?>r�&h�	9�@��ߏ��]3g��c�����O�'���~�'d��h�����~B2?A�O8��?FOKQ���O���|�~���������j\c�������1�.5�'��<~�'h~#�o��-��>A�i~�	i}}.j�}y����?<~|��Cjp�ܨ�����}z~�����-����}Gհ&+�u�?�	U�����i;�?�Q����d�qƓ?�
��KV�6`z�q��ִ%+mU^�C�I��%+r�l�ajј%+fuy�����JV�6���`��qJ+�����$__ٯ�����|�j��JT�SYb�Ɠc�D�����\߫&J�Dmwr�ũ+�c�w�)(�-����"z�W͖��JzZ�j����v�w�Z�fK�l���͖���.*���e�l�u�JO2oW�q�f+OVbe��Iw$6/�U���l�6��.�f+���+�4N�le;[�<=��E���l�+[�f+[��^;��h������=m��f+[ْ�[N�le+[���A�le+[5o�q�f�X�-�+7��?�j���-�+wd��'T�V��%�t���U�U�l�^��u�l+[5nCv���*v�p�9N�l;[�#�<|Ot�M������΄|���a��c��P;T2�g\�i*v�����~���4E��"1�#��i|;>ۃTd�&��Y���y~���,V`2N�lZ8M�b%%�s�k�p�ŊH����l,V6����䙁�k���
E�c��O�C��b�"��``�`�}�B��`0��a�}�R��2��p���JE��)4�����&~Oe�4����~
M�j㠷�8ƫ=��������#��:
ެ�0�3�p:�W{����-��y��q҇���N�mX{<��O-'X��z�u`3����.q�'?�`�������.�Z�)z��d����Oy�]��<�^�d�l�w�m�s�!�`Z)B���-&:�Ɋ����a"N���ƅ�Q7���le��$���7"D���!���陭��{�bs�oFtf;::��Κ����l�F��x����vv$���fB~f;?�--�˻�D~f+?�s��q����V~�
���э���+;�NЩ[���+7��-�Gj���+7{r���`�F[������+3�ޒҿ��o��+3s����`�e�ӑ��s���h:� aa��B�U��CF��Py�_c,2­Q�Gݞ���B�ű�CF�qPyi�	z�����{��L0s����|��|pm�򖡻{H3���S���;�ŉO-[<��g8����	���}�`�@�..�`�.T���8��� ��M��K@v�P���fnTl�ݽ5!�켡!�q��j��ٰ f�T����o\]� �\ s����$ �M�1]s�P�(� ��(�'�[Lĉ �iL��b"K����<4������3���	⽿�Ҷ݌�{*��̋��ݎv�P&^�Wft�:���{�����@�3o�+�x;9L�W��nWc,f��=��W}��nW����K�4��_.:���
����+�b�����/�+��?u �Ļ~���{oJ D�x�`����	D�x�_���������
L�"wk�ڟy�/�wtv\Ĉ���[�����^�W��f�("ī}pe`�@D���Ʀ-E~x�_���Q"?�ϯ���9p#���Eݦg�3.��;���÷�7No�+������+w��@���GvnM�@�w�h,�8��(^�Wn�����u?���>�wF��3��+��,�����]Z�0s@.����C�0s��Ñ��f�T�. �"M��X�H7�����ŉ��ٷ�r�����&��f�T^����f�T���Z<��'#Ӧ���v&��>uE�;��uP�+�������xIO�c��`��Aef>ou���pL���-f]�jgF"�
o1�U+3I�F�����D v���S�bX+AI��=�!p�b��h�V��V����&B�&B�z�Eĺ�	�]6Ǳu=.�����9�	��	\G����N���/!'X��
rY�A��N�uy�����Eo�N�HW*vq��D��^ !-.- +�J�`�2�-�e��x��.�.Tlt���B���\���KOC���kO��`pw���q����P����/jq-R���W�8�)�~�\�8��9�9�e
��:��m)���NI{~2��rY��8���� ����xݯ��rY�1��+�M�Q�2<��X�̔!T��\y�DӉL8~2��T#D7���4'X��4$�>���	)3E	�X3^���%D��H����)ө�q,�`��S�s$�`JuӚ� �"�.ņ-�e�.E0]
��2���`�2ӥ���-Rf����3�2ӥ����ɐ2ӥ �q��RL�B�)�������9����Y!p��G�`�݁E�L�B����H�"�~���Ը�XS�4��/)3-�:�	H�)[ �xB�oL�B�#��'C�L�B�Q�q7�"�ʅ2;�ĥ�Ff�̲�O�H�i^�=�c�L�yL�+bϼ/�)^`e��I�E0�,��(B���!x��:���!�vu�E�LC��:�)3]�ޏ�'غ����k�K��L/��03�ifd}�vLS@���Q�';�)3��+v0���3�n�0��B��LG#�����F0-]�r��LW#��N�H��jd�1�������e��{����_i����&x��4�t��&�������_y��`:YO��,A����!�_�č`���&��7
6�s-Rf�;�8�)3ōbj�'X���7
΍��F0������g��\���RV�+�xʠqS� v|�T�Q6M�����T�S6���u\��E�L�K�����`�zw<�'X*]^�}V��k����,��513M]��93֝�M�C��w�	�G0����v㏑	�G0����d����-�1��1�ό�n�l�L����G4�l-���*��J��#��G��5Ǚ�G4叢7��*	�G4参!Xl���|Yq2>� DniTl�O�����hD�R������[�u?p:Z+��,�O�'"�'�"�~S2A��\��<CN�x�ܗ�<�ɵx�\���̯�C���P��=Ԉ�Ո|Y2� ��FD�F��Z��9ޔ��g��u�UB��\���ű�5A��\� V&ǜCJu}��a��
jD�jD�����E��q�z��LP#"U#.��sq���v�Z|�h�FD�FT��9ԈHՈ��cf/A�P5��X�ꁥ,�����k_v��7 Fl�9P��~��5����:q�^���������^1���߆�U�MtS}W1֕���b,4l�MčT��
���)*�Ht��5^�p��#�z��X5L��S�����x��"���\_X�p�O���Sh�4�[VB����x�+
J�H��]�	%z$�B�۫��h�#�vf�lu�РGb'��d��?��H��Ƌ��	�y$ZB�汵��D���И��1�y$N��j�oڱ��-�_IћG�$4�G#I��#q�8����<'�b�    ����l'�a�CJ��#q6�-'O��qv,6��"b�Ih��3]��<'a�c�,RF�����iv��8	���ַZY)KW/ܻ��<'�a����y$N��s�Ao��а�W�ƥ�y$2B����&�Ed�몠
�Hd��u�cP�G"#4l�ܽ�0�DFh��,�0�DFhX�<�0�DFh�š��T�g�K<����7���<�a�Q�
�Hd��͎����<�aGC((�#�*V��.�����o��?~|���?uH$��9����D��������G���а�^�'XċX�o�4�Xk,X���e��^����̌�B��(;:�Xd�(<�EM��а�뷠&�DAh��x��(+RP�G� 4lq�΂�<a��݁�ΎDAhX��A���а��P_?j�,x�U�u61vuH�R�lb DL�Z�xT�Zg!^&�'�N'��&B��e�`khʀ���1LPg�Yha��x �ى<w��16:��{$b ��m����
��D�x)%��l}�/M�r�]�>6ݸ좃OD?h��ϊ��N��'��D��t�*>��a=�˂F>�M'��KP�'"J�X�hǱ��%����65}"�D�.�9��m2:�Dԉ���o|}"E�ΞS,:�DD���L�J��ж�������Oĩh��a�
�D����=Ƕ&�����>����O��B��LѐF9y��#XD�hXqL�
��Dd���l�!h��)�x��h��)�����l��aW���$"S�����qC ���v���NA"2E�z��lZ��>�G�V"0�`��<K1�$��D��N�'/�V����ˀx��@�H��Xw�g�* �B]�NPI�IT��r���'��7�@|Pݑ"u���g u ��!1���ј���C0���{�u0~�p�_�ӗ�����/��}���>�Cgr���i1��޽�w�~������a��+p���:L�m��{���߉h;6zvaT��h<���5�a�l���
<[cǪR�8Z�bk�/s/��%x"�F:̽���P�'"l�X)�[7T��x����Z��O��hX��qA���Ѱ���@����cg�X'X���<w��Q7ֳ�UP�'�n�X����
<u�a=K`x"�ƎM�y��w"�Fc��1��D������]P�'�m4l����xk� p�E���ј�c'A����c��:�D���M��� O��h��9� O�ؐ�}W4^�fj��,�k4�����C�h��6�8�2�h��6vy�tF흈��x�Z2j�Dt��o��=̨��5vv��w"�F�GM��~'�k4�g�AF����!x@U
<G�l]�a=���;]�bq�5^�f���;;���<]�a�c�%� OD�hXO!�Q�'�l4l���XkL��`�2bm4lqa�2bm4��9Ѣ O��hX�L\�2�Dč;{ʮ�^=q�a=3q�z"�Fæ�)��B=c��q��!WD�h�!�2�BO��h��X��Q�'�h4���Ψ�q4v��F�YT�8��}"�
�8�y,ȵB'��;��Z�G�a]'�Z�G�aW��N�:q4vl4a�`/�h4��:Z��8s0e�ʬ6y�P�(Ӆ8;V|�m�N�x���(Ӆ8_F�.��h��I�t!�F�o:����)q�}�[�a=S�}�[�a={�f��Bl����`��[C.����B9�Rbk��8]���wk�hՅ�;v{`t�!�YbV��t1��~�}���bj�:�c��A@���5�7�Z���@=޿�[��4n�����:��;�ѧZp1�[�s��{��ŉ���[����A*���b:4(pq�%^�Ɲ�6���Z��$K���2���v�+`!�Cc..�b"�}hL�O��D���1������ɨ���g��k�0���x���`'��΋��g�PJqϘ�x��q�y��k�qkۅlB�x��x�j��'v���LcQ����d�����D�|��!d���6̗��q�_��а�QVd��B��/�=�=?���wϏ/�?�|��û�/_�Q��*9AC�5���0̉o�/*�nw�����R���O���|�f���E�.D9h�;vH!X�4�z{����OT�����8~�4\���a���ጧe��N��gm�m�pe *A�~w�qhυ(w����u _�*��	���n�����0�I�_P;�-J�^�u:Pj������	Ú��{ǳ:�bx�
~�.�K��ZN�Ÿ$]y�b�:�컾��XHW^���a�BAM,�(o���[L�uIQ^�SO煯�҂�XHQ�a���Tc�~AO,�%��z6:�M ���J��&~�<������q#�2�s2N̤2���w���A �yî,�b!�y���9� XD�T���{��b!}yy;��T0|oSP��w��e*�������ǧ}�"h�/߰8'�L��~U=����11��"�ve.���t�"��Ri�X<c��
�wl���F�K��ǆ����}SUP�
�7������ �W!]sÝ<w8�LR57��C��à$M�c�OW�#;�_pa����[R0W^tA�P�aM����$��r��pǢ�ҩ��d�`}���!��c�D����t�W����t�N��'�5����!�鎋w�O�|�:�T����@l�r��0��a#?���֠9̤>m�;��>`4��ԧ�����Ԇ�t�;S��3�ɢta���
]a&�r�;w��C��:X��?�K��U����vm��.�DSi��qLxL��v��������7R�Ծ�2;]]��}�q��ͤ�m�}��Msyejd�"H���BKj�gg	��.���]�;��3�|Nέ�����ę,�_�N�e��^N�~�%ΤM�������r&�r#'~_pN���;Y���s2F0i�WL���g�s2�G:�F����\@�N�NcB�d�!r�d�XMŹ�A�����Ԃ�9���a���F�ܑ�y��\���=s&���5p�đ��a#?�ܸأ�Τ�nL��t��!`��n8��7pH)�Θi5p��w�v��_PYgRY7\hM
�L憻æ�5(�3)��}����5(�3)�w�����gFלI��p��r�cl��x��9	�0?�bP�Jw�B���D�X�6����vk##�d��NV�{��k�3�+��j㏋(�3)�w��wW�t&t����:F>i��/of�~
Z�LZ�]�_�G�H i�w���uݕ,uL�l]����Ɉ�w��Duݱ��Τ�nd��l�dd�4ԍll'NF�HY]�P��Z�S2z�Lz�F6^[zNF�H�����S��HY ��u儫$�
�Lz�F^���9$��N�L�h���AҚ7�1�vNF�jk��m�0��I;���_����_�ZP�gR��x����v��
Q K�i9W��Α˄�ڽa�X�G�i�wl0�'z�YP�gR�7������N���7�w_d����;./�6pؤbo8��5pͤ _�-KK}��9y��8�|G{/)J�LJ�u���
���<�|'��<�+��L��F.|�s2�?)�w�v䚸YЉg҉W2��������e�{06��D&Hޘ��n1҆�L�kr�8q�'����|�)d���l|�dd�T�;9��N�h�3Y@�~YDL�7�a,�Τ�ߙZ��y��L����N�(�"~c��[L$��;3	?��b"Y��_�,k�&�-&�E*��˚���&z�Lz��"���w�U�~&�~���8d��q�8Z�M\&M܎Mw��E������,bD��X�c/@�E���аw�I�`&"74lv-�D$��-#5a�"R��uS�y��`n|��C��k͢c7��C�&+��&H�����x���������g��Pz��]=?���K,�EƱX���X��(}'��?�
���z�_`���8`���l�ҫG�Q�` �  ���8b�Ʌ[X�������$z�<Pzy��5��?�"e�<p��6�X`��8b��=�"e�6p�z��^���8b=��[ �^h����0�����;�i�E�zU��5V��`��^8b�c��@�U�#ֳ��U�����y��U������j��c^�
�^8b��'X��W��ű��[���@�F�B��% e�5p�������+���su�EPz��ag��9��)�m�#�p�N�HY����wȆ�X,�/��p��f'X����X��x|���
+��}<e�J_���^�������:Zġ_���:�8v.Z�½�:D��j|/�:D饅#�����B饅#v� -�^ZhX������Re#��P����9��CF&z�!���p���"��pĮ��H��7����l��Pz���M8�w�XC�?�"j��p�z��^`/��^8b��u����+�����{G�������KG��S�	)덅#��+O�HY�+4�WM8�[��w���x��Q����+'w�=�������.pJ�_����w����W ��u���>��ىp���އ8`�g#�>D�}�#6:^��(�Ѱ�7Ϻ(�q���+<��{G����+|���,�ZǱHY�%�g���^�8b�㚻B�(��q�z��Vx*QU�#��F��Ϯ�2��VX��0�`��
��
��:f�V���/X]�3|��B�(�|qĺNa�/J�_ �G�[����
��:^K���(�1q���qW�B�(�.q���`��ޕ�x������D�E���۪gF��w%X}��X�(�+јX95�5�
]����<Ʌ1Qzc�5v�� +���K�8�3�(�7q�c��,.9�:q�z���B�P���6��ؽq��6����.E�]�֙5�4�
���.E�f� �⿿z����V�      �   *  x���Kn1�ךS�ės���d��v��%9#�4v���?���4��Ï���o�� zX��W�k,�+�5F�	R � + %����~�P�&W�~���M�*��49��t���.'�����\o��!�_�<i��RLރa;g9�r���t���.1y�]T�.�Q������ |������\����m�l��t����Պ)�(&��r�B#Ⱥ�݈ן��!�S�I��������RW�,�nR:=�x��+'ʈ��ts��㽁z��3>�JlӃ0�B~р�	�*�j���G�$��|�`AA{C^�ڮd{��	�ו����P�Nd��;+�Q&��,@s�iӛ�(Z9M�g5X> ���kq�fJ�b�P8w�Xw��}n���dM�)�A�U����\�ŭE+⠷re�B���iҟ���KyF4-<#��t�Wʄ��;D�d��-D�R:�7(��E���(-nRa���5G�d:�k7��ܛ͍in_�����H�V�IN����H�UW?Yul+���חeY���u"      �   0  x��W�R�H|}�<�S��M�7k1�-���UTmM��F�dq���Y�C��c}zz��9�Q�l�z�X���S�����y�0B�6B���\�c_	�J��:J�p��nbt�$��S������� �"f9}�>F�9���?@��h1���.���$���h!/������Q%���QU����J8�,L��g�~G�OJ����4 n���}�K�LNғ��$̮p���/����/8�CH��~��!t�Q6�Q&i��g�$M�x�I|�avy����+JIO�n�������?%�i��'���b�Lm�L]����~��o����x���
I��
@����T�9 �L�vO�҈�aJ�����̢��]��>�C9��kr�(� �����hޱ�fɿR��r���,�M��.�
d�@pV��GH�~9B,���<�m��fZ��)Rk즸}�q�仃"�`t��t?�r8~��۵\�Rc_ȧ�Ɲct; ��BgT���\�kYWC��U��MW8�-��Ǣ:�
�1�2���PR<�
�B�餵�J�Atm����e;�s0V',���0�À��o�� �(��t���Шym�7ڼ���j�c����}�jtn�ca��'M���=VU��e�g�^�7M^T���˜m1�9�+x5gt��T�߫�x���⋼j᧼�sW{Z��2O�C����(+��.��\����%��0>�����{����:u�6�@N���^��}%�ʊ�?�8����#x[�a6
Q9�?��cLCT��P��!!���os�����6�dǜ��t��>bC>\�ؾo;��}����oէ��`8:�Q>���:����h>E�~�x�ฎ"�ę޷��Q�0q��g`N��V�:#�_@e�1��09�Z栃�u0����k��w�_�2�䁪N8x��f��`a���a.QE������K�9
����6�=W�;@��c��:�ջ��+�܌��0��0�&3�n��դ��ة��YCw���3;�8X����H�Z��֯k���+���U�Ư��o���� ��a{#	�f�^��:G`*89����O��a�eY��������`����G�1�/a�n��c�Ut���ۍ������f9{��P�*�<���t�,J��O�e�]�'�OBX���,�g���r~��{q�7���qs�	!����}���з��K-�8�N0��&x�\e��]�����n��'�Ok��Yw[�����{�����?��'�dM�Y�Z���0�jr��]��P��T���#��*�AM��[���U�:�����bC[n�Q��|�wE�-eQⴒ+��:�?ꁝh�$Õۆ*(�/�g+�V���/��o��Fހ�	M}O׶�=|�P�tQ�H��C<>�Y���A�O�mU�#ρ��B;��.�z�TQ^�.�U!�EG��ݭ�3RYnY)��K�8�G]/Ԥ����u0�دf��%�^�>������_�S���0Ը���͉eY��#��      �   �  x���=n�0Fg��@��ל�@�d	�"��h{T���q�V�~��>ɒ�:;Pz������m  ڃރ١�"�`N/�
Z�����M#�`�(�O�V����ؘIF�ڛ��8����n���h|L��h�t�fM/ч�I߀D�`�[���$��}�Z�ވ�����!F���v"�3��膞��	��
]r��5���?1�|��i���U�:Tx-��K����TL;wѷ�nO��vLWm�^l��&Hhw�"�D�b��&xHť�P��ۡ��O�[w#���vL�yE_��"�KI5�� ���h6��x�4��t��'� *}m\.�gdV��L�t���c��!�5?�cE>���x�|�<�t$t �;�/�^��"�-U¤t�Q$�����5�mE��"ڰKmE��x$4泣_�t��|u7      �      x������ � �      �   �  x�e��n�@���S�x���
q~�XNr�U��ٖAV���&�h-|诪�j���Ұ�r�9ӌ��<68�ΔU���E�	/�7��0F2F�z|������ܮ�϶*�-�d����O��/���So���
z���3�(���Lr���^F�����rd��!���D
X3��y��	�� c��X�V��>z58`�#�\%�������kxhߨ���a+�6 L��J���J��q� T+���Z�E���zw�������h��C��6�*;/�
l2�+�&��_�k��M`��e�-���<�k8?���
�:�f�9�gy���x"N!�W�f�mw�؝�c�;4D��ع�z{�v:g��x:����?�:�������_��Z+w\�"N/�<�z(翋#�ۏ ��О�      �      x������ � �      �      x��][S�H�~��
=��1�ꦒx�2vcዼ�K�F�Ӹi.�������Y%ْl�%5���@�.�TV���:4p��_3g�i<��8���u�*�8�j�Δ;Wˑ��e�ܾZ,#w�S�//F��<M�!,��hv��S�t���H�N��牷ۈ�?����4�v�,V�_��#���7'�ē$�p��Uv�pu�r����o�r���~~�s��͗��)-x�(�kx�Kؑ����k���u��F���-��D�G�e�:� ].�3:���-F�2=��c�c�H=M$wK���u��f��$�E�!a�c9�ۭ<���愄Sʄ��\^	F�d��� G�Hdm��#O�yd�y���q�Ep�x�r������������<F���I:;�z��p>̙t��p���g�_q�y@$q@��a��ۈ���I�S�x<'���d����q<�|>�K|xG�����p��T΋B��"83S�;i2�&
�u�f=w �$�x6��>��rx<����E�p� Z^(��;&*a�T��=4�/���O�x�2ő����� �&�p>^���f����ʙE�TMܜf����'��<G)��o�,�Hx�Em����v���B����)�<F�8#w���.��T]��P�Y<(~DSP&I�p����$�Z��_s��D���)*,�3��R �;�Ϸߵ�ҫ]�#="<���?��x��dC:��ʙĳӸ7_,�Y�v$�k�iQ�%P��}x;(�g@4����.���_���	֞������@m-<*ZћU�C
�n'6Gs<�M��<�����mK�ކ0z��~�EAU���5�� TC��������s���t��?s���I��ȑ���Q��<0YI<��[夡�'zSТ�"EU��G/�D�s���d�;�G'�x|�)� x@|Dp뇛����!���pA>y�c�5Ҷ;2�zd�	R�E�>{Ғ�` �@�V���4�a <�2�q�@��_eO]8Y"'SR_C�dGG^��S8ɚ�7�L��N��J���bh�ԯ��aj��d䁣@� �HH�8O�߿��n���՚t0����F�Ha���BX�r���,	�x��q2pѰ�y�(�S��$�9Q z�@&�֕eg���N޻lj��8 A��d�~dI�}��v�����3�~}�|�~\���o�s��q��:�Glg-D#����S2��5g��9��	� ��x2 F��\%Qo�� i{���=�4v`P����Q��0�,������&;����n⾽��Zĳ2��5<vg�b$L��p1*̃A<E{,����T��,l�3�ߢ�^|�-
ӫ�v�W��m�[x�#`e�h���T�*AN<Ajk��³#�W��gQM���������H���7N@��@4'�Sd4xw��S,�#��a�����C� ,�x �Fb��I�#qVY�G(;��*����28�DM�A4r�jMA�����Dg��^��9R{�jk�jH<��˷��}�Eak�	�/E	�Yu�y��PV%�B�i\����d��`W^�f A#�G���v��5�VYC(�D�% ^8�o��v��}Jw]؆�^�XH�H�=?�E b9C��������@	�*p+�WUZ�*BS�ʭH�M�	6/5a�f��� !��!�>�l'���p����O��4J5��yG���%��X�<-�Y-���Vc�1@���.���OH*�/� ��2����;W��w�/�ϭ��!"��������߀�4��Y�TE�VLƈ�E4y�=���D�O(��@Y�e�)gȬ`1���y�z�D
�n"$�kk@[�/���R������1ߖ�o����$��B�����{��笵4D�#A;���#9�*xj���k��ÿ�*�`gR�C�?X��o����u%�[h��^_�9��n<�`�9����h���P�ذ�*�KP�gΙ>9g�d�:��@=X�:v�JU��F�N�$B��#�N���{���s�P@OMZFI0��8W�௭�*��G,��Qn�����wA�`��@xn�T��������]@/�J5)^��oB�m`�<ew��
�a��30kk"q^�}���Y����*f�4_���6l"GW�(��$���(]̔L���l�S�(�zc����%�SD�	��4R�]�9�	�)��<�y �p�@�fuu���vyJ��%���#�!*�U-/�O�D�*v�l��>\D�$N'��a���p��LMP�-J��0�[�e�lD��6*G5D��@:Ow�����:�c�EvHTv,��>���a%�18�'��#ȏi�P}8���l���6
������x;i'[k*�����?���:��(��d0k�?�vf+�*dT������S� �o�R4|���:��Q�Z�/5�0J >�Ö@os�;�č��خ��<'���@���-��rr腨'�� Ac�5�n��/�qg�(�8ؖ�ar:���r0R�e4qwa[�� ��C��;^w��_|5�XC���|�&$�㨏��� �i�HP{@���yUMrc$+��(B�6ňu��<�[G���pq8�IT��Ji�s�}77�(���;$>$��g��M��l�I-�DbgM��=V�w�#�@'�����> ��IYz�0�O~� e�.�/C�,�՗��[�d�:�0������'a�B<U���\�Y�㠌���G�R�J��	�q2�'ӽD���<��G�^����AH�Y�" mZ�q>�-�n�|�J\���g����5�d����e}/ WT�����G\�㱶�i��Ԩ���04$&�9�;D��R-�;A���~�d$�b���0����ԝD�a����N.J�ípOU�Z/���"ОK��ܨc����3�������N��3x���4�A��=kB�	����3W���j0�uz�f���Z�G�,B�ɉ��}G
s�*n��j�R�b�㯸����NHQ8F1��bZ���O;�	�]�o�5xN��ⱎ���dƢ1z���s�B��X8]�o~1��;���<�x�Ao�������`{Υ��w�3�j��G�3���: ���Bۀ!��K��
��`��}���$�p0�����]�3�Q�@��&�V��58<�ن4D���z?�b%LH� �BO�=Is���uvyc���۾��f�5�at;�Wx{-u^�	�h�,@�q��s5���K�2Er��ͱ�
%��UKCTao��	܊FW����`{`�2ʅs�z�.�5`���p7}��5��#|��'�R��hp�0��܍�]�&��<��/�y���/����}�m�S-X��]%�����9���VW߳�|DG� F��&z����z�ܥ�'�S�wxcs{Iowig��Gu ��[�aR�����"0}OG˯���p�Ԥ�u.�l3n��T���s5��%�?8Z�gws���-�8k� ��ﴫ��bJ^� @���t�����/�l���WMv*��p��	z�%
�V8�`5��@H�fs�t��d�"�Xq,lz�MM��$'��\J�ᜆ�;�".Za��T�G�f9Y�JZ���.
xr
���0>�Gc�e=���o@���P 5�֟��q"������~ tF��������s�w`	Q���5�	[�T�E �Ί\1`d"ϖ����p�5�.���pyx���l(�
��C��0�g�Ǆ2@��\ ��+\W���gv���0�7+ǖ�a��Kh��UO�B��#A�<{ ���nւ ���k[C���N��8�q�������f���r,����?f����*v� l &��r�`N�4r��HM&�S�\/��i4p�
���\���k����ɂ����tQ.M�*�ː B��j�t�]e�O�zť'[?C]��
��k�)�@	k�
ѲP��]�>�^�]^̇.���\]��%Ԋ��{n]�l6f$L��A    ��B�9�2�h~x�5i�NH+Z?IԷV04�gԚ� v�r��h^�[=�]��;�.�D���9Fo��1�Hc��O�x*���|~��`�vQP�r��A`v�7��=qZ�٘�9vN0`Q�^���i�@�%4���M�e|>LJE���i�UU.Qv9���j�]w}�������E��U��Xgz��uFk5&�i��k��v��V�.-�iۢ��^�U�BP���
�/Z�K�}
��3�JE(��o��C(��mdOGe8]ĳ��ƋQ<w'��G)W.�t��&�i�2�cV������^�1]��RK�ω���Ȯ#�+\�B}���y}��ԯ�3��I<��׬X���5�����HF[���6.�i��	C�����|�f3~D�$G�V)T���;-�P@�^T�S�f��ԝ�o�����&<�	��8���e'�\ƘF1�5Fj�K���:��0�&�� �p�b�*H�t�mS>�q�'������9h%�nr�~�a�W_c�5%� �b��@`�!@��y'��.�v�g��c����jۉʭt�r_�D�o��ـ^�M�w�5��R�>;�ї�?V�W����&��|�)���U�d`��m��U<�K�b��	L#0{�9��Z��3.8��������hn�}@NBz�=�@�g���G+%KfMؖ,Z1������Q0SX�1��+�/�y���K�u\?�����`�I*<r|�<ݼ\�dw�@����4.+$��	vٳcfVO_���.�B��-��s��:��Psw� �����S|��i��l�P�'k���g�Ԡ}��x��J�]�	n�e��>��p��nP���"6U��!#a �P��w��W�>���YZ�w�ĩ�g�\,�O�Mՠ��2;�O�@��.lv�+V��o��4�SL������}��a��R\k�Bk�=�V�j킉�������d��,���֧`'_S�5;	ƴ�8�y^Άä��0�c��on�5sU2T�57�������d=���\����]��Bx\�t��7_[+� ���B�״�jw**�$�t�;��-un�l0J1i�]���C6�V��.�#5!��8 8#�	N ��<g�HII�KJ���&�� Q-)9�HI�}_X�ҝ��X�������R���ݯ`"��g�=��`�������&[�e���蠯�jk`��#sRKG�����5�ٱӇ�	O(fQ��7��]�1�q�XD��U�����k/�VN�q�]WL0�z�����P�t 7�E�(�x4���5����[jm�8�m�ʿ�*�=��X%y��?A�}1BS��]�E�[��j���mY�<��n-�����ع���#lϭ�g������>��|'���]��#f�����|/�}�ưA��i�����l8v)D��" �tOܩ;�c��6M�'�"�㵎�6 ������7����G%���0i�K5�{�kk ��C��eg
��lӝO�@b�.��o8���x^3P�@},�x�-�0�7K�iH8 xǹ�����7]��r7̈msxm�q{Ʈ�Fˡv��T��x�#4�3�R��;��z9�2�V��}wGg�k�$Y苐`^ ����u���ק5�vy{~������ky-����b˃��J���yڏ�w0��r��︳)�o�R#� ��C���Z����^�5<�n'��Y���xշ��fj#c���vM5v��L�,��ˈ1��la�@���Q�R`�[)����NZͽ:X][��H��Q��ۀ���������cn�ra���Y��~|��w�ߴ�'��k��-��e&�0��&6ii���f�����E�g3u���#=�����*�
#���i�`7�u��(Uh�ϸx�͌y�o��KnF/ݿ�=��3�>3CO񪩑f��-f��U867���/�c�*�v���t�\b9f�O\-a\(�=
�%Ǵ`0. g�u�鎴϶3Ҡ��:Ȼ�Z��$�V�V�f$�W<�[�����,:W`��{T��ڮk��{W��i&3������4-pIc�|�IF���9_���l�+�Ѝ�F�	GU��GB���=���B�H����fp���t?Tb��	� ����_s�"���d���{�M�@��J
�d5q��H
����DȰ#��{j���P��I�N5��v5������ګ	�]���/e�1�=7������1��g!g ��)[_����	�0�'&������� 9��[�>3��t�F� �=Q0gqPL&<�'�4��C%Ȳ�]�>90񯼶���֦qp<�  ���RPl�nw}���������+t�f��赤�3(Pz(w�GRl�������d��L�*I	���?݊�D'��\(����3(�Q��3i*��}�nJ��EO0��'��*f���2���&��9�:u�]U��2譶��;5b{'�}��n�����	X��Ϭ����z�y%a?��`k�eð��	��<��NC��pdUZ<�n�>e�-ͽW��'!Nqz�^��G�0���wk��:O�ZZl�|�v�~}�S9�1R�CS69U�S��0Y=3=�)�@�����j������k�*h%�!/e��O�s�ԹPw��+k�O���A-�n����;� #FE5����p����k�_�[�{��M�I6�����}x]O	)�g�E��P�����P��u�&�Zn*��u�H!~o��I|��t14��DKw	�\
;�1���E�&�� |�۪�?����P�KQ�u4k�#}X���h����c�5���d���E6N�鴷	�kѠt��~�B,�w�Q�p����*e	��<��p����qu��d�/���kcׯ�	���^�BP�9��K7�h�F&��۽�z�{fcrn�]��S�Yu��%1u8��� [J�wB,�#!ꐻ����S��_�wH�y�2
�I�I�"��L�m���`�M�c�j�@5]���X�m.A�����6��M� p*<'$L�r��� ,t{\����R�j�����,�W�c�'����!�����`�&�W����?߬�o��#o�_�.�f��ǌ���"X_�8���O`[��liC��qZ_�G�2:�S [_`�3����� ���`�<� z ��� _��$����;)�x�'ZQَu�4oSZ��y�^u���������So1g��/ЂY����iuuإ�G� �WF]Emgu�bY�#U�"����T���qR��@cD����V�B�8�q^��+v��~�
��\p��h��P�>�7;����<�eCG��!�:�^��	�^�Y8��#���記�W�йT����GoyͭF��[�UԞ�mkm�>�XA�~>�1�H%3¬Q����5p8m:�����c4\�}^ ��'��J�������c�g��Vr�����w0�0=!.p��,:�z�!�Pĺ�_�md�6�QaQc�QM�`^L܍�[c��y�kml�7�q�Q��[He�,:��������f��o�`�hehxn�{�\�(�1 ��D��dya<��@Z��]�H��>�Zz�'�$�����(�'�>]'It�"@���^�g�Jk��TwY@c�c��+O/��5|>@�������4#�QL��hi1����6��pa�Yo0��`�R}�~��_(��plk�s�6�=�Q�ȧҗ��O��ϫ��
�h*j�s��HVk��+TTǘޣ#_y��S����p^~��&����s> } cआϷ�M*&�v�%�Y}J,iI��+��\���T�w\�����Zwσ��ɏ�*���-X��y���u�6� VI��JAa{�i��f�߆~�����@�L�"��j�C����4{e����&���r��}�f�{�+O����� �.Q�[|Z�T���\K�'@��)/꒰ 4|�݊�������*�0�q������ju��;̖Ӕ�^�+"�`�͂�l����8^���w�k=�q~$�'�	��)���Վ�)*�U͚ }  �ƒv�ej�f"�fz
�N�����*c���~���I[���?��4�W��[��q�5�.�Px��@:�ׇ�������7�L�Q���	�;����UGC���������4^�tX�{
�>��O��K['[^n�Rk-���y=Cx���F,�~���$9�D#�	�s~�����Pq8 �}b��1D ���?­V)��G9�����
�d2�����f8�E�:�T�WF���7W�W�/kg���\�x�7�7/w2��/��f|�q�����'��r)Hێ����L��|낇�?IOO�ѯb؎?ĮJҙ���;�U:���$O��qqcN�W��9鞚r�����㧖�k'��k�qY�b�J�vzA���<I����k�g��P'�ɖ�0��˵�Q����ܼ���R�d�}��erzjI�Vo6�C�\�'��$��q�2U�A��)��q���2��Uɍ��߰5�V
���������7l'�G]$�MPY[���V���ǁ����|��x>��/�r�������߿�?]��Тݏ�vۨ���ϝ@A�5Zb��|���	�)%��Z����Q�ߓ����_=��np"n��o#٨}
Pl<`)�j���b�-�GX� �B���}5-ӥ�����{�C��5+�	����y�o���:�Z��{��V�s��~y�~��]{��37,uR5������~��9)��Mj�3������D&y���D�q<��|ҹM���71&0m������p��������C�����n���5!��
�F�Sru�&����.��s��v��9�q4N�;:�jx)���xf���W0G��������xc���}�)�Dh3N��X�ϴ��75��}$Վ�� �Y�Ilˇm�k�D^p.�U�-������Cز�@[�mG�l��{`|W�o�=F�����Q:�=[���so�A~H>�*�ެq��)!���)6�6��d��qk���l���K�W�p���%�}����K"��������b0�5n��Y�u1:;x	��Bԙ��i\��=\���Q��N���6[?��#e�7v�8o\b��)�guu����*�#[ߵWL�VA�EM����A�I�i�k�u�"¡�jj�C�>T$w7:[�)���X.p�����q̠'A}ͷ������l�W�d/M�$�N�c��e&@��~���~s�6r�k��X@2����ŎL�=�ZF hQ�ZJ����W[�U'����⤘�zOT1k�G���F��uG�`�׾}z�[��޼2���u
YףR���1�T]l���� I6_��*�捖 ��>mJ�Z����Tݧ'd� �����A{�z`gMX��cMO�å�DN�8 �2�Yi�"HO�z0	�X���⢵�*���Ҏ�~"�z�N�*$��h��������.ۧ����}�9|����3�0"��s�[ƙ��_�(C��� �p[�P��ж%�v���J��B�x����w�"�-�?a=o�ÛB@/�����τ>=ܷL<������5�Y�Ra��d2�N��N>�R���I�t�(�S�N��H����7��:+���A�n#CW���n�#B)u��[��.��^��NY�VxE��N_R��(b�szc�ef�4�rvP�Bl�GB.5��M�n@��!���<Q_���v��Mu���(N1k�bS�_�^�8�ٿ�x�_����B�����^g_?�<�\��S޶q����\���֬qjk~R�6�v��� ,�s�P�8�`��4O��/��	0�y�SKT�FۘB6�Xm(�3�q�`��� u@�ܾ�[65�:����5T���Q~5t�1*�)�	�a�⼗O8�c 	�	6V�����R�G�+�O�>G��[tD�Ag^�$�B\�Q�i��Y7⦤m�hx����X{HZ��%Q*6����F����t�u�N,�PrV[�m�
��8@��r�ԴFͳ��d}̛sf&W)���3i�vsn��H��H( x ��3���W�i�瑲5��	��g�U��(A��d�ǳ��l�.��\X���xd���������
�p@1a7���M�1��Y�e��Ta1�FP'�����dyí�l:7�f�����O;c��H����#��Y��6�N�
Eۓ8���5��˛���M
x��dG?�L��VxB��W�te}M��J�a���� ��(ơ�=���������cM�t���XQ�K
P���n���Mz��%8�V�����H9ݲ�����v�z+>��l9�(�)�p�'�X��(]��X�b�A��Td;v{�}H�-�F���P�2u��U��Y��\Z��>W�yZ��}��$o���Q�c5��o�4�!V�Y�ɷݮ�T5��)�{ء�����|�]��5���G�ώ̵Ը)�bN�i5Z�6"?ѓ�{��J�<Ů�ԩ���@KS00������6Cy~��=�F��H��Z�ɣv��UWߨ���σ�0�8D�*���n~�}�{���V�;��[M�B���m��N��<7`ܳ�Q���c��ZMctV"[P��s�'ms�M�E���s'�K�߹]n����Rjl��N�6�H�c�,Y"�TF�XM+��Zn���7#f[6�|�R�v�9{�����u9ɘ����Os?�B�Rg<<㞪~���8V�WxJͷ}hve�O~��9:U�}�{1f�� ����ǿ���2�Ě�y��k�=v��CR�?��=�8�O|�D]�ݘ��ܣ���vG����oZ_c��^����Lҝ��|�N�� �p���M��a����C�Y��X�6��w=�Z���G���� ��%	�Z��F=k���*J��0���Ю^<�j�其����u'�rm�BF�{����0�����V���;�_�-_(����FZAG	�F��G�R���L��������>p��|��A��a�C.�3�
�����R��8;���8ó�1ҫ1W�Eo�'��]?h����2�� �b����__��. Pی�_d|���4e|��c���������_�s��c&���tHvu�x�2.d�5���+���//���߳�j��ͮ׏�������g�xu�=_������������/��T蘖<"|wm7h�����_�����3�M��O^�?Ni����~:/��L|�.ҥ>^�^�����X�8g�ڠ�����K��dp���<NgS�6w��]}e'jb/"�z?c����mA~`�7�8����-a^'|*�
��e�~YFli���ݦ���5��܅���b*p��o�I���b>X;�y��0��r������;�.��kk`:Y֣�x��F�e�5Q�D�����54F���x�4�����}!�tz���2ݎ�!�S�<g�h�:�v������,y;�W�yϰ�>�x|�K[�=:}Ȅ'sN�i�^���6�`П��ʵ�����Fg��I=:�!8��3
�@�pL�F���Z�N�(E�1�ϱ�X'��8>%	វ߳�����C9�qG	2�R	���e�]ۛ�4���>9==NϾ�������	9�<:���|�OE�F��@&F7m9v�JΜ�#�Mf��ɻ}����1!5��S	p�,C���S��_���i�NK��7kEs�A�䜜]����`7�|�|>�4��;��d9���?5h���X�2�4)��`N1*����9���#��#&���
�$�	���8Y�	�����f����<�<4<������&�����wP'݃ɽ*&0��^�4�P�	���}]5������3�l8��fC�cO��Ow�z��A7�l2�v,�CL6%8ۓp����^�ȯ|Uq:�z��o�XCQ�O�S�����B�2�ݜ��E��nR�ch�T�z�K��n�n3��k�n�^.��ÿ��o�E�c      �   �   x���K
�0��q�
7�z_i�;s�@�bU�u��>�b�2�߅���ik�Z�ަn�CS_��漹����2�Xv����V
�.dZ��4�e��RG*�m`���h�:(�b̶D����r���cy�޸g�J^�gZq	#q7��	U� Lٖp���`��mi����,���|�wK8O�9�K?q��]���;˯�      �      x��][��8r~����6q�EoP�MR�EË{4g_��̞=��L���� R"e�d-iv�u�$? ���.�yz�^ݙ�j30S�,/LSz�v�%�T2�*<���{��{�ڶ�o3'�u��izӱ���ۛʰ�4Gֵ&e�iފ���v(Lw�sR����/�q��|�Ԧ��A��p�3_�&��<.�ҁ�& ӷ�Q���;�l�E«̐�4ۏ�6�Z�&
��q �EٙCn��ߛa_�M�N�Knj +��_LZgs;�g]y�0y@����4��;�ؔ~��K��1�v�L�E��&/��8��DDQ��Mg��l؇�Rִ/��L�gZ`�̱(���K���/�ۭ컱�;)wJn���Hy�eUuz�._��{h��N�V�p���e�i/J<���4^��n��p!U��0���"K��� �A�Ur# ��A���e�ǧ�0��/ PBH���M_^S~ɦO��g�|ϾS�8fD��)�ȋ9&�9d��N���^��Ra��xF�]3Ғ��K�{���65)��jF�wa(x(���|I{E��2<?�b9�8�I"�蜔6��=4�:�7e�t V0��X�jVA���:h(�O�h�O�ND�2<�{��`)�e�R��v�Շ9���;@%�B���D4T�7e  �8tkӟ��q����h�qd�B�U���E��\o� Dzq�U���cc���c������c�� ������Ǜ2�P����PzbD~G�{�=&� ˣM��8�+�lw���+]�ƣ]�1� ����E�c��@Bk
զ@B/	���>'}/�<]*ְ8vK~�ϡGD;%v<ޔ��H�4p�=ֻ���DQ >VrlӬ��w?��~l����K6=s;�p��f}�\�i�0՘��WU��,3`r�e�/D�:�R��08Yc,5f)��B��T ��:�P((�AnR�Ҷ�j����KL����� 'K�J2��]@��J ��@͇G���yN�
�H'I����ƟV��P%h����2@�䍧��l /Z3,��|�[�ϖ����`�(DW�T�n[�O��7e /�$���#��c�M�u�*J�P�jE��>Mdc��v��HE��M`Hx,���4�N0d��.���XʄK�S^���j��?�?�?�
LV۰�m2gs�Zv�jr5�ؔ��{�"�X����D�$�Q�#�d�4TN�XI����'���� ��L�c�@�G�鯭��;�%A�v�,ڔ=@l
�k���ؑ�"����R����f��O-`�$@O��k��X߼�J��Ŏ_���7�I��dS��(�����՟�B�0@"���'+�2��S�-!�n�Ⴥ�����׾L�v�0y0<��L��-�g�հ��h1�MM^�����%(kZY����-���76�� 4��o�u�Q 'sGy��r����G.�d�sWd��~
�ɐ�z��,���R2���!�BQԻ%#����(�33o�9��`BBJ�iy��(CPFԑ��#��\~q�$�����GV�����&O�d){�&3O 2�*J��bSFc;���0����cv�dz���K��"�4����`d�@�Y�a���U��s��r���-����@]ŷ�YFc�Ȱ5jں6����R)0�Jҽ�}a���H�,)V�'ջ�����'�I�Hg��؋��]�8�F���vc���p�ÐuLf� k"����eu4��1�m$�� �z�,��~�~�v���mǄ�2�|'�uZ5r���4s�3��#Q��S F{�e�[e�d>lG޲M+v��w��h�)z{� ���'êc�`��9�Ӈ�HLQ�LO�Pe'4XFkKA´�����n��H�P9��o�%�<;����߇�#�8a��^~~�1ذ*���2����G��ik�N��l��(D�u�d�{������>����K�?��\fT��ےb�r��'k>sT���)�� ��8LH/·�y-_��7��qe��ޔv���d�(��0I,�b�P���زH~���S���,��Ԋ(��7e��FP9k]��zD�=�@��u��FR�� g���q��|-d��Q	�s9;�j��dv�_��oʁ}�׭��z�!2�� 1��]�g�-s1�F�[1��e3�����r�rs9>q�V��݋?��>Q�d6E�
<d��qO������7%�����ɵM����IM�RM�8�}S���Ȗ�sִ�=ci��u_�hhX ������b�baƚS5fo*�>^����:��OLe��=<�R��>�e������rЈY���D+�>��_.�BY��0#�����.�L���q�k�	%���o�ަ�AO���z��M]�9s���F���gR��u�%�T�K�"w1(�*��T�v�L�^� ���m��:�̧ܔ\lJ��^Vg��P$I(u"�[�f|��	׈>��2��"�Vg��ώ��8$�h�B<ξ���U�E\ɠ���wH}9��t�����q��sa.�$�*��x+ʡFlJ�ĢA�R��Hz����#*��L�,#��"��!�i^��eP�el�@9��v�ϙZ�f����;�.�6e��O�V�!��ca(T���<R�*�S�����M|d�d�"��Ο|d "Xu:,d4>%&�{9E)��22�6h��kd�S��X� k0V�qV��9�S�3?���t[�o®��M�cQ�[�hXx��+���7��s*g�0J8"0Z��duKs=� h3Z��%�j)��%��~���Gƅm��M��]J�NY���W���֊� a��+SO+2�`-�T��[k;��E��G�#�����d��=��y�������<n}.�j�r �Xl��������'��h!#�0LR{?��+��c6�B�:�4�f3�Q/4�2������*�,d���������5_�}2�
�)ƾn*�S^:�JN�$:�l�i$��s���O�q�1�>�؞YF��jምnOC��VQ�#x�oL��������p .nd���,Xh6L�F0'�Ú�IG*Tԝl�_z�4������9�:��p!#��oe��vٝIÀ�XxOc{\6e~TQ%U��r���u}YHZ��+l7P�Z��d�i��.S|�~G�O=hBn�'TTQ灹�(DԞ�8P��TeNմ=�avUR�fr��h�M���Ɇ��jSF���P��sJ��9�t.^	"�TSe9�,-ߌ-TWY��ٓ�ѣC��M�@*����]�_zJ�D�P{�e�g�d��ρ"�=KJEl����<�M%n!#�p~�����Q�1���z�8�ҳ�`�*���};���ʖ�G�
��rSF@���@�v���/@�d)��)�1s_��Ϗ`�Ħ�0��]A����YeT����t9��b�b�tc(�^u@�8�"���x'����Cc�ܼ0�嗅�U1e�5�SJX���:�ٛzL�})m��[Q����1��W~��۾��V�gÂk�dC�TF�#
V�=�h�%�r5G�ڹ��G�ĢDh��0/d��Fs�{oE-�oP��4�����"�[0K5���&��y!#�x��;����~�HơDH��I4�MN�Ծ��������l��'5��V�@��es�g�l�(|��G�"]g.� �ɾM
��/�=��+�2B
����i̉�����Br� �w�A]�/0���<%'ө��X�cW���_db���1>��ɦ��%��Tߞ"�H
�C�ZX���貌�XS~��p���NԞ`S�4b�%��p��^�M����`[����;.�Q$8�Y�m���
��Χ.Dڻ�d�)񒔳�lD&R��2_���N���D�SH*�6������c0pnmK�y���Rc{cܶ�ן���������妌��UǞ9�gW��JS2ংd�� �_�e@F�l/9�n_V��u=�?�Py*� 	  ����������;��T��3�Kv9����'&��b������k��Va�7;���>`��]�hH��V ��]\�ֱҔK-��4�:�,m��8#3cG�l<I�������2�K
��D-���Y䱦X�!ijꋭ.�p۲�����ڔ^�$�7}ڧ��N�0����G���惹N��!,epQ͒�<�Y*l�`SFHa�C5ٸ9f�=��ŗ�W�
�b2��m<9�~��:�xS�PM��k_����n��X� �bjxhJX�j�!A�x��K�6�[�\�̫�Q�|ʬ۳.ˆޅ�5��e'>ՙ}��K�,�DK�A���>0xj���j����kE�I���V��/R�|�;\��I����F�F^�w������<�N����������:v�L?\& �������s4�Z�J�H�BF�a`���.ïK��c�|�g���}��CCL̇����5�X՞)�س,�s~{��*�D�mdy�� Vǒ�=�әĖX���RF#�i
�0h�R�&���
f��h��a���8pH���n�:s�<�V;n�-\Rx}g�����v,]�ڷ�r�Q�ޢ��:�rvSH��d�h#���H��W�wȩ�C��0��.�A�m����E@|SF@����d�uG�6��_��K���>aZ���tKFha�A�i�{*�R"���E`AM�\q�_Y���;_2B�)�5��q��O1� �"
#�[��Kj?j0�-u��:����o��:�T�)Nl"f�x/+6�.b���񂨸$�@��/���ϭ��7�zh�AY�+f6
o�f����T���X�F��)#|��Fq`�Q� �6N��Z	%��k�έt�gf-0x��v9��g���� E�@a0��x�A��%��5�Y�6�ԯ:.�^���������a�����ן���O�1��C�	�E���F �%�aeQ>�5T.R�u��DT�t��%o;�c��	+c���y������� f��l�3�V���i��+�l�M��J�m<i.��KgӘ�l�\�9�g���5�]�.lD�k��3�5��l�N�)#|�ZT+,�C~���y��X�`��k�!j����@�|��qTT�՛2BkE���N�E����	4���mX1V���S�E6|S��ߵ���5֗[f��8{��V�����DHj�/��6�C�DO��B��&\8�u�u���>]/:/�2B\p}?��q>\��7��ڋ��'*P�O�"E�`o �2�������� �b8h��M��焟��?�c�*�Ta+����jÊ�����Ծs�o��<�FNm�=|M�8�׍s��R�̻����'A��}n�� +/$����(�G���o���\oIe�>E�t��y�U���/d4X9�6in.g.��b��yW���@��F.6e�*��/0]bpFl�eN_'1T^�tu;�e|^�@�=� ݷ;񹆐�����A�����e& '0�O�!���е���$d+kw0�Y��IID�Ӡ�ףkA�k�8�՘���y%�����l>��8"I�odb��aC�$�r�S���>(:ו�U����y>֠���\T�7e����J�4��1�r�Ƅ��?���_���CTr��e���\��XT����CS2R�{���.�|6�������nw��!��:��4��܋�fI�"<�i�A�I�f��ta�$���IǇ�c�\��:���T,�}�LDOT%"�Dg~)����T��������:+J����l��ٱx?����y'�R�0<�,��l��rj-#DB�W���1�6�P���TUsMk����d����ij�Rᦌ��;T;��&�����):!Bg|A����a|N?b�ڏ��ÏW;���t�j{xLm�(�D�g+p#AI/�wA��J�����|~�K���R�в%w~�\�i��'"����K������x��'�:!m����@X�)�!�1��4c������t}@���4Xü�x��}��h���u��{^����R�?	[��Āq�k����w� I���v<�U���О�2����ڶ~"V*`�Ma�w�)!�b��Z��ȹ�����x���;(�Dtz����s�ǘ�3\yxN�qx7̪7����U�VD�~Z����V^o\�����6�^�t!���j�0�Z���' �[��M!V{�je����Ql_�T��_���R�-�2`�����/�ϥ���� ��%.;ۄ�8��@=��pϞ'>Q���p��Z�[�۳��i}Н�Fy���((�]е��"-�8k:X0K��c��v�Z���h!c	�B>>ٞ7��M�7=�U�)#lp2<���)ꣁY��Au)x��wȦ>r:����Q��>m&��\�ZFh�<��4kmo\�ꍣsT����)C>�b�ω�$!�E��0a�5��.��&��$$M ��x�����s���Uݷ���]�;-6e��K�������`��ǩ\sޞ��R/��g�*�D�N�g�;��T�L�M��pD�� �[�\Dtm����`���?!���7e�~EН�5)�uJ��������H��'"Jn��,#D0G`g�,]�D<����Ӎ (?�g_�V+e;���L���R�/٥Y2TEtH[1ܘ�e�P�v���)�&�C=	_�n
�7 �R�YF�����祀��z@����r
[k.Dh����|2}��C��D��U�2�/���{[����:�����ڏ]jյ���/s���6�m���g�ؓU,��v�p� O<m�㫦���("{�ԏ�=�r0G�ف#���Ev0&or{l��<g��C����2���E�ޤ�P	�}���˞������v: �W0�ͤ�t��$� *�'�X9T���|v���^��զ�`��
rQ,��y���F�È�f�[ � � b��q�)#d�C2� �ܔ�/I�?)�����"��|�2��-E�s^����w�g�N���ZF����>k��A���;��S՞�,�K�%�xu�]@r1�zSF 񎔞�@�z��?�X4g�e.H����� �"ћ2�=�g��ӕm����8E��p�n"r
�����Q �Ӂsi�e��u�y�+�x��\H�Zh�N�g5ņ�a$�nI:f122�tt����IY�����������9�G5x�S/⢊����Z!�Y���P����Q�~�oY+`�^?�i��Dt�������ֲ�k`s��S�R������wQK�r��q������O��ڇ�R      �   o  x����R�0���)�8�G���x��xA���*�����`-�ۙ\�l�߷�.R!* uo���np��������� ���HCg=��4ݏ��>�*L��ɜ	ʥ�J�U�r?+&��Ќe� B���w��־]���]�WZ0�w�< �<V	�&���$��6�K�b�����E�sp���z{\D�b�_"_%�S`��p������ �}�s4Icxn��H�i�&�$�������S��)��q;f�߬s���(/���&z�)'�b�,+:M."�ws���Ȁ�v���==P9���*�V���:)L�hœ��0z��sz!
�]�뫙�b�aI��.˲o,O��      �   �   x�����0 г3E(�7mrc ��8����r@����S��ư2a2`d�Qfd��8�.MhB����8� s�N��S`��
�ۣc�z��h�C�p:7Vzw���Y�`�j��t���L�d\��fV7�<�߯<*�,��JC�ɭ�R����P_kD������4n%�;O!v7D�S��,۩���L�N���z�#���R��؛��M�e�1�6)�X�a�6���:!<���ۤ�c��j��B~Ϩ�      �      x������ � �      �   �   x�m�I�0E��)r�Tv��)�������-�^��ӷ�-t=��4�"3O��<�4jR� iDl�}�c�jn)�NR��x��2�MT)	��P��(s�ÉK��!e��(O瘎��k�n�h�<��n���KW��B�y-�      �      x������ � �      �      x��]�㸑���+p�v�=�O�c�j����:ȗ�f�� � �\p��_UQ�Y$MI=lf��b�X/R�L*��$ٵ�M��,�ɥ9�wm�ܬ�D��' �c����i^,u��2H�I|�UR�DZ�5��\�r)�R�AZ��D}�5b��,9���I�,����)���<�/۴Y7�����ZJ�K��ꥮ��n�%r�G^�q)�q�g���d2�y��\-�Z¿��$?�5bZ#��o��q�Y�TU��i���}�^����U�
U-˗0Q!�(��&92Q�A[��G��C K♲��}���g�m��� m�k�v���5mO��%]����6]���������L���g'��r�b�4���v�>���zw>��y�z����$R��x�G*�:c�T$�!�5���O�\��������nW݅��-���z�A����4*�^��]�Q�ޤ�Y�(�y�̓UI��k&���Ӧ��N�/ۓ���Ks;5���:��"_�:H����*f�z�Ϡ�|LW�沙͢[:�W�3Û��8,-�<GP{�d�J3 v�L���i�ܮ��t�'���y���K�i��%������@]B��u
�?��<�Jj�L�ow�ziWh��c!�簖�\/�*H�O�F��!���*�,1P����A�rW(�����^wfW=n��f��߯���n����uskϧ��e{�6��'l�%�R/`��z��24|�
�$�!���]��A�|�D��FX[�$����T��.��#p۸���m���r�V��L؂7!� mP20'��R��06Ӌb���@0y�c�X���Fh`	
.4x�cs��l���xߋls�pS8BiwY)��eU%��-}y]�5ٝ�y��[�qFVG���K������w�_��l�9���/=��U�U�O�.\xʤi�� <�vCQ"6��vlr�D���QS��2��V4�A�ld��2���aҌ*>�2Cln�-�Ԙ\o{�C����m;.�ƅ��A�8�,)+g���J^g��h��ΗJ2Z��%��H�OU��|��c@���RV i�5�@���(U�#U���G�_�|l���K��P���|j^^`�jOO�|˥̖y��JQɤ���ܗ�t�����7��v}:�O�f:=IU 
.�C�R��!�����1�_�9�S����a�u�t�'
�4ϗ�dQ�E�&��%�4����R{úSmo�cI
�eA��͟�yJ������o.������)_��L1��h��?
E�j/+�������9���'9VI%�3JN�Y�Z��8Y��N*� � v���@J%]�3{�{�5*P��eѺLK��$ig�_5�%��rL�qc��x@�DR<yg\D*�<`<}G5�]�1z�,<�5nu�B���ˢ^����N	�(h&���p}���"�S	۠ٴ�	�q���<�_M��||�ހs�����eDV'��%��qPU]��8#?� 2�v�5�9�&�&C��̹� ���	��z^{�XT�<x��O�pl��|�\���W��{J�*H�|�Qy&�Dy��j&3r7� ^�ԋ�zK�w��54���)�l�a�g,��}�Zd0#��fh����UҬ�����8�M�>�	Z8y�c��C�y?gsi�+؀�+G�
Ź9�M�Vv�7�a��l��[c�ãJb���~�;+t7.�Ξ�dB5#�������k�xcM���p|���WJ�Zf?H�F�3��K7��}�i�c���L�9��Gτ�}V9�m$�R觪�	�:T+0����y~M�����r
`0��i�Z ��� r
y�:ǈF��8�|T�'?��+�ꙠF�
f�a�ڝ7���I����v�E�	�H!c�X�˭�]� N+lj&��OI����w��=GqI$`��M��sB�N�O�-]7Ǘ׫�=��������vӦ��ARy�梞�uh��B�.�A�}fp�(#3���UK���ôhB��췠=EK]�b�L�0uzm�����%�o�խ"h�b#���?��"��wT���Ǥ�yML�~��2l��1T[�'���!f�]�i
\+^W�z�ư����w�<n�����%��c��<H�r� ֊=,�����j��zO��?�e��U!�����	����[��5z�y���IS�F�x�gc�3eH�Ә�^9��������~ۮw�v�ڽ���������ܶT���U���}~=��C��|I�Φ��ۥiO �bQU� 5:ɲ�`���`�ѭ+4��]�����1�J���q���\�k�\�X���V��%	����v��MN�ۃ���^������NzQnӈM6cG�C:�ͱyj6���S��	m&,T��T��ʌ��.�^�A/��E��t ��D+s��7uK���K���tV��|iNI���eC\��>-oN*ܓ�Һ�\*B�:\~�-.��i�h�W;CB��d���{�EyyzyK�b�{K�Bg@�ALxȴ �N�|�-O$�Ÿ�_!B2�Xs.��4�+��[:>�M&>���)Ѝ�4^�$����Ӿ'�n8��e�]:O*;բ��\f��"�9�8�a�f�TK-���T1�N�&�l�G�p��MU7�� C��Q\#20�"��a�a߬�Kjm�w���+�B�c�X�E��A�PCj�p�蔠q��7|1�Y�j0��M�Uf��3���žS[�&��'`:`���� �^�h�_��˽��(���Qv�Q`n�����<�Ks�ފU��5�S:��yX/�ט���֒Xr�xL���Q�ǚy�I�U5�ِZ+^~IA��7���'2z�<OU�l[T7��:��Z֩F��t���~�����ݼ�amu��GJ],E�*uO뒖uA��q�1�������-}j/'�ۮ?��<$�)�(���7G�CaZ^8Ȝ%�-Z�-���`鷁l�^��rn�>���:s|�I�^f�(j��r�M�/�z<KP8{G�t�Q�^b̢��k��z��;b���n������|�7��kw�zz���� \�:uw����~!n�ۣJ:1߈���b]��R-)���e�Y���rڈD0� #�����::���q��W��ORC�s�6�u|��y,�l�n3�+1*nK�0H�a}K?���JV൙읖]$g7�Z��0&��H�TH,��hf���"P��x�K&U��/��$-<"���i��l���
K7�>p�9�%æ����%��@��m�tL Sl�Y��-���A7X�%K�[�~���ʭ�5�}\:ql��D^r�y�(��.�z|]M^N�9g�t� mXN5�eK���\�haaiS�Ge�:
L�R��%�8p��cAZ7�؀������}6�1��玨' �O�i]P&�1Fd^�v��>�b�A��U�ɕ[y;;}��(��0B���^�qp���ƧQ�`�*���[�sӅ}�ɦ������BQ����&	�R*>bY;[`E֒���hݘ��U�Jz�� ?
mF�+�ګH7G�,�9wr,Z�+��u�{�E�i;&vYۂE�š:��M�b�a�Z-׈��[�C���>Yl�������<�0���@��%�2�ݦ�c�ض39���ll3h\����F+�%*w#iC�����vχaz"}�X�Nb�v9������f��I�Mh¾Ig���z`X2��.���f�H�RP���ݢ�W5�������H��[/3p�E�֟jhP���<��4������ m�s��NK���
O@ݨLI�<K�]���^�떊�&�6���bXIZ9] �YjW�zp�?*�W?��{��C�3�';�r�CF�F��kL�i'+�M�5F��S�e��""���))鬾
�FC�Y�6�Vҫ?��u)<x�8'Rfl��N!g�r2���Z���xKW�u^��℡O�ݥW/�_ڔ�{�6D���ȱ$�n!���l}��6���(�	��	Fn�D�WP�Aڰdkbe���2�LK[�4�~dB@&�`�fY��,X<d�7��<⌵�Y�^F� P  ��+gω^#�ǈ����$q��+��)�6�ql#74�q�1$�s�u%X���M`Öv��l�ƪ���;p��_i7/L��P���nm�K�`������δQ�d!�K�Y�K�Iy�.m�_��L÷�4s	�ȜK8���p�д����i�C�ā�p�C��@π��­�d���K^�SK�?�.#� ��S���n���Ā�+Y7�E�K�o����Q�Ӝ`ɾ�ݱ^H#gC��q(��T��z�S�X�����feh�v���Q��A���ǁ���Lf��*����`5cM�D�KȆI����_\S[���t�Ai:������z��K)Y~ɢ��^�BܪǛ�(���"�9��Q`#!P�-5[���Uk���w��[cgUV��֢�#�.�� ^�Ņ����O�/�����	fd�ܚ�_玣����!�"�_�N�z�����G�ASZ�(l�W�n/�D�L^f�qRn�?�>
�ߪ
Һ���H��f#��ƌ�o�y�Z�$��z`4
���7x���+�+1_����[HUeC���e.#qE<�ю	b���%`��C{��������l&��Z�>k�����`w1p-��-2��v�+��j�RȺ\�L�$ɒX�����#�7$�g�n�i�\��枾������b!J�gò*iMC�Β��/z�E��f��+y�4T����X��$�"�Y�?����eAZ�2V�쯺;�
�9�l��Q:ݷ��2����J{���N��i�/��J~޽����y�%������%���	N�{�P$>mɷl�H�C2��b��fU�	Dx{iO��	xNW�(�1.i�$'�;9ﷴEf��6Jly����h��.�/ﺾ6�KL��q�i��ڽO
����l�ܺ���D+ /S7�z.�uǭ��'�G�)�������K዗B2.��HO�u%]��Xau�s{�J^����3�IL�)�s��屮6��A��K��Ǻ�s�pa�:H��kQe�<�)��O緛w�H0{�b�B�|�Œ��1���r���ӆe�Y�2~��lh#����sn��`#!4,uo�\�3��[iw	U�/���?H�H�&`�W�C�$�ʪ2�l���-}��o`ho��3��?t�O��}��a�{��������l�fšIn�~�\�5SS���`����>�Y%E�"H4��Uw4+m$�	8�6�H4�i��Z[U���'�x�͆E���A$v�U±���⿚�v{������A/z�?�(6�~�*��F�)�f�j�|`a��p��Q��b�w�%k�n,�r�2H��u�j����	l�K�r*��f�ߞ�r�˹g����)Nf;���w�3x�4�b����Ûi�n�)�Fh���|4f�uuo�崻L
�O"�A]��]*	;���:Ű�dpՖ#s�ΛE���AZ?욠��O!����4j<���B�:��_�K�'�Y������7;It��kC�m�����}5�37An.����V��*� Ś16�L�]]�	j��2�=��<�N��V(��G��|�E��.�Ɲ.7ahC\�Y�)LI���t�f" �
�E�M�JS��I�/�𫴰l�t�+�rΫ ����y"����A��n'H��/^�@��jP<��hv�菃��nN�[͛$XBy�0S`�=��J�h�(/�z����VwF���)�$7��^2�ko�q{�4�'G�_�i0x��,�/�3u��8�pװ'<pG��.�Z\�e1�5 ��֊б�),��`�{��(������s�����B}?�i�R���޻#�u>HOaadT�����ѓl�E����y6f!�Ky��������,y??�7Mzmn������t���yop3]eu��I_�;�����\B��F{� �z���/��������P�a��Q׵���	�����"P�4ϗ��&}�SӼ4��)c ����K:BE�~� ?�}K޺����2���*�����N��$T�6H3k���x�9
m*	�=X���nk��+���m�SR�_��U8����;9��ޢ�����kc· �LU�#Y�̬�+I�lU/�<\�!Ve�U��^�)�.έ&��`��E䆥T~�{�[:�M
�UN~���5X�y�FBX�˝��m���uw���F�{s
����<e��1���a�*��݅Vs����˹x���f��C�e��+��9�g����
�P>y>�u�3��[�p���|�M.����l��� 6�G���yɄ�9�m�qhc�k96>�,.�aNj�vd�Qޤ����[�g��ߌ�+��0">@�}�:D�o����2:h���ӆ"
և�%�x)fk�a>|��gC{S�u�Y�3I-&��"�s!�aA�߸/L��<[�p84������rǋE��)��3����_=
l�	=Z4�"e!|JߛD8mX��t�F��xg�Lt#M����
�<l$�k�����Ao���w6�.���MnŞm$T���2l$���7`�i�}n�j��AB�_�����4��)�Uy
���6c��� �b�x�r�ձЅ�֫�8��$�u�q`3b\��wZ��E?͚��^1h�*��+���to(�QU��$%�K-Z��)�|r�>R��恛!+���GJ�=}�s��Uh;���#�����佇���'(�҂8ߌ3\�I`_a�=n��KK���ܷ��O����[h Z��_�v��+��<mdW0?b4!�&��w��]xS��%-�Lx�u!���ľ�<v��L'*\!9?yQz�z� #/\�V�ͿN�G�P�
���I��/�rD�*���BQ�nA_�5��y;o��&��q5��3�CP�u@�H�/��>�K'ly
/�*H�&���fĸ���=|ԃ@d��AZ7b�(p�k��7�F�Cd�X�F@�����Qh��G=mP~�}[d��"�<p#%I�ф�vj���FN0�'�T�a.O�������g���R��/~=`PJ1p#�����WTM�6R�+Ĉ�K��;njO�G]tt�t�fơͨa��=�S��S|��:`�2S�\K��^�
UAZ',�
���Ј#�fĸ8��ʛ�=MGyu�6(6M��Pj���_�@,�ɈH�I�2����Xa���xP����O4~���]�����Wok���c���p-�p\�}�+�G"a�J���QW�i�&�Q�=ߌW�{�̤Ze@�����lڠ�xϪ���ġIPx���D}�Q�A�����\F�^}���?��O�s��_����O�&����v���F���9�i=<�o�9Q��_���u���Ү��*��U�_�~���s��{Ƌ����\:�_���sAD�^8��,X)�.�i袾�#N����t���䏿���ӟ��׿���/�_~�9̡��*T��Gzx�N�M>�� �*���K�� �8����p���H�mڙ����_����?���?��������o���_����Us��� ��`�d�0�������[��m�GAw� �1 <@�T�y�~���b�s��&5-�gw8����U���~�	R�{�8���OX|�������      �      x������ � �      �   4  x����n�0E��+��<c�o������B������;n��t���s�{!��JE
������Ȱ��Єj`83P�N0�q3p�T��>��'٭H��� �w֓V�=5�^1���_^����1#���;�XC5ԑ�P�ė�Г�㝺��3����J=���)��(z[xkf�K���
.��Ŀ��$�K/�~=������V
xk����I�4Vs�*w�/%-�p�[F�vU-�٦fF�Q���,.�c��rr��M���R����eVeVZ���@� o$�r»\�Z��,�>3��X      �      x����r���-x�������$��+�D����T�T���p��s��m����J�(}U*�J�r�:u�L��ky�Z]h���0�¨o�������������͵�v�C�������壼����_�D����Ưo�~�pu���on��?�������?�����xq�π���MJ>���G��������x��ͻ����r�������_�����`��A��j��룉.��C���3ʨ_�'6>n����3>�^0>v������?|x�������_����s�ڀ��/�]8r�c���>�_8���b�v;>Ԩ�G���|�#�3��Y2||X���Xll�U��4�>���3��z|�g�Ngͅ��B0�O�%g`����B++�;��wqt4�vƬ<a���-� >�U�fߏ�[[���<��q�����c̅5kK�����9ิ�9��$�
�m�� �����v	N�:N=�4�l��?׋?���]��՟&��c�-��������O�p����3r���	�o�no�\�_|�~�����͏W�ח�o~�y�~;?�����.?|��p�p��U��*+S�}������}�x����[|���7���~|��������o.n�{�����������#���߷����_����˯�'oc*4�l�jҍ�MUTR�������L:`?��<��]�d��Ƿo.��뇇��||w�p���������7�������H��F�l�N%Wݬ��k�YQ+���4�����Ww�//��{�����Vu�ݧ\t�%[���c�1+12|^Q�a����a�����7ﻏ��]��m��cK��_���VTV�:��J��3AE^��y�Vo�G�SQ�c����Jn�DO�rꦦ����,�b�w:��aUo��F=�Д�'�q�)Z5�^:3/���WW�o��x~�o�����������;|�[�)嬊���U��g�d�J���T� C1��f+�Ƿ5az׷��Ǉ�7���-�_�����wWoon��\��۝ê���^U+M�Ks�����G�9;m���W�Ƨ����a�5�f+Ny*��P(v @�p�j��50�hּįL���W3��#��y�����Xՙ)��1�VT����?�6ŎWfu��f�'�i�.�
N�U�d�!M������4V)њ�n�#@9YM�/�O�����W��7����|�uD����c#�h_�r.��\�=$��v}X��Z���N���{�e��W?�<^]�p�����7�'_jOU'�ȫ�L�'ݻ.�a��J7#y��1)z�Q� 0S�\m�D���}��m�4���Z��ӭ>Yt�1�y�>릱Y�R�ɳ�=;�ӆ1#�8Y�H;=�(c8����E� Z�\a�#�7}ØA]���	n��9x��r�M���Lo�����!��r�H0��-z�z�A�i�7 <)VoK�PQ=������j{�u�g��O�E镬I�ZD��].lX4��Y������n{u���%��p�)�M_��e��'�"-H腎C^ ��VP)�X��z��ޫ=��7���W�4��d�~`�3��6sƀ�8~�Xy�^k�:v���(0驗oք� �`��}0���g���Tz,޸?��ذh ��k��$
�F�6;��k�Q%U�w88��Xح��N�}���~���?��N?_�޼���o����~n��n�p��7��G����������wpF�nb�nM����[0��ˋW��ˢ�~}~Q�j+�
=2WeA�U��(<7jD#/dOl��d:GU�7��\�R���P���uי|�
�D�����Fn�u�
ܴ�(ג7, ��i-b2��b�m�-gku���Jm���!�ŗ�k��	¶e��C�i�����%w�7!hPb�Jщ�{�iR�[�@���Z��.r�bF8�y���&���foS��(�.x��ʓJmp�I��,�{�ö��n:�|����@78�<�؉���Rg�1��)��X���3�i#��	���D#���z�U�9-�J ��iфY*֧
t��`g�J&�n���-�.1}X4X��E�d����nT�3�7�2�iӢap�g_��fp��au��{�W1�b�6�̠�����0��Vj6�uG6@R�Qs��A��u���ANŘTJp��h�`�	�H5�,@�zٰh h+�Zl�W���(�2d��8tu�A�X��୧���'R��6n|�S�|�L|�����#Bp��k�稵5J�06L�e�MN�@Z�e�C�Q9U]N��8$���&+�nXdOeR �������)��ΉR�e#�NZ�uʉ�%p��R1�L	��#Hm䍀0X���J�D!J5O2�4j�ɣ�#�ٮ�W�aр�8������5k8�U�M��@�����4iu�;U��������5c�LS��(���0h�J�)�ʪL�q�\� }K`!=P�
|�D�Pe��AK��_�"��Ԡ{��@O�;-/a�m�2����d���4S �ƲSՇ�8b��K�
"�lZ2n�}�f��U1���� ��rI.����kLv�?lQL�G��R3�b[�Q5C�4ŮQ�y����iK�.{
g�-�F	b*��L��CQ��^�7MO�S��b�E7D`���������3PiÔA�
�0,�2p�@(��5�
A�V�ln��t�$�=YW��,D��b�Cb-O]g���d��$$����BNGp.����n�i��[�OaJ��A���}�9��p� |:9K�뛦LL9	�jh��]%ÈAuF�&!!M�2e��H�|u_�>�L
6(�cw�K2	�®�̛�Dу��%e���Y��/M�����u-��%P4�b(�����K�	T�F6�#t�n�(�$`k��Oܷ\�܁�v�B7d���m�od���߀,ZU*X"#�P��m��Q1'A�V��]�Y�yỜ���`ô1~Ӕ�*�$��@4r�n}�X���V�X��_�2_��Hf8��29�w�Ȁ���R29bѦ-<3N�p8�!�"M�j'W�ݪ�Aa:Qh���G�q�p��M8�5X��軦�*Hu�v��.�W|Ō%:�EU������rq�W/9%��ʘ�R�D�-B�t�O�EY��Uh�U����El̐�'��Эpf��9���(&N}�E~�a̐ٻq��"x�6
�:4v�Mr�4ۆ�Y[ްh^��B�V�G�1���F\b�Y�l:T���%�_Q�j@^~J��C�{�Eˑ�O1+[5�VT"(Z����!o\�OZbh�3�hݞww�����;е�@j�B�yO-C{�P'�w�l��L�CWf/K����ki�^)�҃x�liݒ3���V�G�bB��+�\���6�z�t�Ml~ݔ��t�����c;���9f�Oȑ�f��L�$�Mi�tJIe|A���l�A�\�6M(:r��W��AL��2Te W��Z�n�6h����x�u��|���F��A�q��6��2 <���ML���-�ir�~Ÿ"^#=�� q�9Dܥ�A��s�R�)�jhƖs~��f��[�	���;�'v�ܨG-������4e`��^>�6������3@<*�aY�gA5M 1��_=f�C@ܳs���U�"	���%��ފmY{
��: 4p� t ^�C�G�ڼ��4�ؓ��2΍4�������3(�Ë7E� Xf���E'��)5h*U�d:+�1*%We2|eӖ���s|{�xsw{�����w�~{���
v��s� {�1�l�yèI�F�1��|�arF��\24�(>��>���AΌ�'q�\&�F8U�N��r_��\��3��`S�n���߱*���䜊.^E�_��AOɻ�1zG��c�/�w��Bזx�l�L0MU]��4������ٜf�e���l�gb���l����u �'�(�ջ�K5s.�贐,X�I�|�E|�$�[� 4V�Jѱ*v&�r���4e��|{�$U|��B6Tp�=iW4��̦)|G��}m�i6F��PZwR���!b��MS    ��D�W?C5J�X�!B�x\N���	�;���I���e���Wr��Z�ь�N�P؇M�=�� n��̊���w�s��X�f�t�����ja�������/�� ��T�Q�^���I/��`��|��L�y�{_}�gL�	$A^JL��NRn
���-Ƭ2��ꊿ�_� mp�1�˶6	
/�n��-�*Ȧ<��.�H��Ә t�╆Hל.9�JN�n\嶼"��0�~ўШ��M�TƱ-M�o�W5ip�P)����;2e�k�c�j�i���<�B��r���Ka�Qlf�:0nO��w@A�
�U.�SuF�"��s�!�3�tO�}�&�=���l.И��T�O�|�}2jP>��A}O�ڀN(_���çt7�j�e��-�xާ��`c�Ӏ����Ѻ&�a���[��b� �YBv��"h���R�.˵KsE*X��"��ܗNۺz��"���gr*���\�8y���ж=p���{v�*yy��q���b����]nmy��٦��~>ʫ�/DG���ds�3�h_�����×,���ŢE#A�^�q�E5Z��4d��j=N��8��l�[ rPC��)8�"G�P��1X�<u&�Jv	6z�mP4@h���2	�9@�v��O%i0�
�,L�(n1f&���_֯�B�J�9jD���ԡ�|�	��tK�T��pB<RR7^�<Vd��M�;�r��-m�2O�E�"{��4��
����s�5�ڶ!g3�pJ؎,��Ӥ@�ZJ*\5��Ũ�A����F>� 
����Fw-��RݾŚ�#��TDĥ�Z��� �ZU�K�\M�ax�Q�j�S�7਄X�>&B�D�F�B�����A��^z��ѯH@��I���"FX�V�����X4`;�)<I5�pz�F�g�6��3�|-��5�V����40|,6r
���k���C�O�Ә�Ba~}��DHi�3{p��Բ�h��R-�-d�Na��!���Jʡ������6�xݲQ�1�0k/�7��4�b����s� ����-l��I�:�1=J�]��@���B@��9P(n1f �L���;��:���6�٤�U�U�Z'���g��xJx�^*�MĚ�uO���3����$�Dq� ��;��,��Q)7ۍ�̈$/^[���aV7!'	`��ѹ���OV:V�fb5���[D���&�>:�}�a��A7��*�[¾�ʺ�$�[����G��V�&H�C\I���!�cf�Ţ��K�w1����w�fho�'�3o!��Sri�qZ�T��č$�ӾJuӖ#6衉�p��&�|v%r�&�i�J����;��!Y_޵��4@�����a�
�T�
������ק����*�j'/�����mE;�GH�-FMm?����2,жCMseIX���ؕj�n���I�����#� ��ݰ)?Լ&S���أ�T�=�����
��9w���
2�B�*E�ns�!�gE�W���O:�
�)�p6M�MbŁm6J��O8�p@�k�v��ɟ�-�� �Sj����K�P����\�G��x�Фsw��3!%nT!)j�&���:��7P�@}0@0)0A[l�.��Y�x9 iuB�\�Nga��H�/�Q���n95� ���"��xP{�1���BwM"�b����$mN�m8b5 �dX"#�Z]����āY��*����%^�C��d�3i���H� $4k������^�+i�C�P��/µ�Gɛ-,y�?Z����wՔLR�$���
��*��V�m/r� �>ō��X���=�]��Tj-ٲE��G�h~��@�j5�kY'Ǧ%߫75ZSӗ�|>�ؒrjO��B��)�/Јb')�(A��k���`>�)�{go��*e��3,+ ˪�̧Y���K�Y����X?^��ys�˃�\�!�W�Y�N�X�"�j��>�h3�3fX�����]�]'�]�"�r\���`��Z�M�f��Y	��XÞ�Z�K-�p�B�SUŏ�f��L������Hh�!{K�pU�p�rBX7=���Q�G>7��M+��w���͛�����\?<��������0�K��8.^�gbH� q��<��O<�,ocl�q��f��%((.�jL#y�L�-\-����������,L�9^n6]1���M���%��?Y蟠a �Y�@��@����Ad��0�Sj��arK3lt�VUx���T�b
��8�GfS*C �Ҳ��0������1���dUMF�.S$a�T� ��K�����sX֛��o�6T\��e�_Vo+���<r�q�mb�^�V�Z�ucJ@� fB5�[��keڈ��+��^Ŵ��Z�f'��V��
\-��[Ϊ��i#$��Ԓ��gC�ݖҜ���Ԕ������4IG�D�Kmo�&mo��������F���׿������O����/�J�O�����9{DN�K#���	8����n2��3\%A�+�ZV�
8(�/��3r܃?���kY�Y�aLp��Bm\5~�8}}i�9��1�?cA��:�n]�1�*���ނb,�f��Q6(=ʑ�'�kq�{МB��k5�y��3�Y�x�3t��5Q�,��̥�J��E[���L�f��vn<�4���c�Q��c�R?�ueŚ��6I�H��/�"��i2x/�j1�K*2�Ļ�}Q!A�/M�f$�[��a=�r�ZmH�4���@g+ �J�e	�P�Ȩ?�m�%��Ba ����"�:�.aV��`3�ϴn�z�&GI-�Q I��6����Ҷ�|�8�M�1�e�x���I��$Oo�����Z��{�_�2ڇɦͪ������cL�[�Xtn��!:�{���8� �`�՛�#S�����L5`Q�N�[4���>�Q[��lą���_����^,�@�2�p�*���<��E��9�E�� �A��Tx���s�_|m�
��Maa$��38���BJj|-6�H�?�a�5Z��Z��գ�l���M�8�4D(W5�7NI��Ru��]Y2�A�i����˚�X���0�u䛔i��BK���	g�F^��|�l-�i��l�UM�r��������
�?l�,5�$�����D�i�YJ��pi$���,H��qɔT�Kh�8��2-/f�U��g0��)��5AK17�꛷�2��i#
�3g�NW������x����`!����2
�K�z�>�g�Q�*�,]GYRe�ET�ͷ�	z��D��pi$�Gs�0��L��-Ɂi$�<<��6.)��X6���\�k g��\3��Ұ�djL8�C0�̊Q��Ӄ���|�I��*ݢ�r���+O��W��0র:�v���lJ��;�;7%��鸶��f�遃N��Oj d�x�fsirQ桛c*k��80Jȟ>�+e�F(���pklr�%ʖ��e���v�	 ��~�r*Q;�������J�A�}���Q,������B�I!l�ZkX?�%_�T���.cgO�Q2�h{�Cк����7�*j	�hN��vK�2H-�ҁ�,����S=�Ίb
�ťΛMY��`�4���g�8��GI�n�R�e6N��t��jGUA<��*�f�=BSLV�LAM��yKO���-��s�b��ma�Cf�\�3��,���M8�{<������'j��pe��c��\�kuy
&���w����7b�뭶�䲮ԤR~(��92dvl��+齲�T|C N��@,R�� qʹ��a�V-�荴9UA�lc���D���wK�F(�	�N�hNW-$�/�RJ2��֌U1�u����Q�@���c��R�T;��Bj�O8��%&u�*-/���Q��縘�d�MC�^�X�p���A�I�Z�Amiά�gy�]X�^��&�k�r�H�5�1���`8�aI�.��*�e�j8�[��H0�-�r�p��K
�YݠT 8z��s�K�V!S�]=����ͯ5�_�+�2�&��8�b�8��
S���J�s��nS�i�9-e��:�!buץ�T���l�KR)�d��LgW�0g��aw�u�SF�>@Cdv���A����w+l��s�    ��1طW�+e��dqt�������c�޶
���T�t!�7�"s�$-Bz�,m�a�˞�}��u:�l)��X�%*/�F�d��t�\�ճڜ~��&�VR�	�A%�E��Yy2�K�ѥ96��&�$9{J���J��j��,��rCg'�Qa��A{����oM�v��u��m
 9�<��Ҭ� cC�Ɲ<j�HJ��Ȁ�P�K��x8Kj�fg�Qm���pa��;9I6&5���M�)*�Ϋ,�ԯ���kйOQk6l���g1�{�ޕ@�4��&1�%m������H1�s�b(؜#a��T�2H�\��뭬\q��#p��g��_�WN*�6Q3�/�!��]^b�f/�����G"���`Q�q��L��Z�B���jg��38a(�� (͠���hP���e#j�y?g����k��T�?ێ�[U5zq��'�Q��L)�N2�X�)�h5<�K��RSL���,��~3\S�^�5�VK���h,��	p��V�9�A��Ô5�H�#x��W�L�
ܭ,Y���v���n:CJ���3ř$A����m�k��1�&�4�Œ�WK�g�і�s�k6*��4ت��z�3�{��l�d�����������	��T��rO�WK��tҟ��+AA$�*�K�f���;p��q�àQu׵U�
Ϊ	Z���OK�°�]�4��uN��&˵JG��S�T�5*�!0��al��������o����7��җG��/E�����L��Cc�/�{�v �`~EO��w�_��G�O�A9����\qwu�<�B�4;(�tJ�ǚ$7�@fC'�QkY?���Y!}�L��z��*��3P���3ȓg�%��nG��3<��貓[j���!���I��k|dPu;�\��ȵr@0_7]:eQR�4�!������2�ϐ/諓�@(D�"��>yj�C~M,:n�9�����s&����T�F����RjͲ���ӌ_���#�[�H1U�\g�%��0lįQ���p%�\�< �k�jb�1����T�Z$$Y�/�� x.��Ʈ��?A!`�����~�������������`�v�i��� A�'�$���R��nJU`�ly':�����ᬡ7%#+2��@H[osU�Y�帼���IZ���VK[�Vrl�)����*2���9��ޮ&k�,*:ز��FLX��:��CK%3��C�pH��.��;$��{_����{������ue}L-�j�4C�$ݕΤ��,M1a��L�>\5UBP�l${6g��av2�`�ҴFA
c}�p���mP�Y�A4�o*��T�-_�&5����٠K�|-�غ�P� �D��>���k#,�)O/�� ���R]�*�Sĉ�M5��Qa\;�Q�9K�#��Hq��!�����d4z�BV�ĥq�G5ʙ�ԬRk8Bk�Z4���I'��q�Gʙ�s��5��b/� H��_Dnyӵ�Ef)���_&�֔\A(�i�K�v^Yr#�ҴF)
�!��s/RX�Z�Ae՚��Q� ����At-��Et�6����Bc���;3�����
3O��.|���7�v�PK��J}ï�r��Ђ�p=}+1X�^`�Wq�ٴ���pMc69��e �(ވ�_�=��$�+����ȵ�=�Z%��ˮݓ��Q��ʶ�
:	J�\�U������Tx�m���;=���E�����j��B�])��Ж-�)gI�k�"��k��W;�@`sسb+o�I������6E;Q����W�jKЪ�(֜r�MS�Q|1�aJkU�Hn���Id<ŬS��MS���6%�$I��6�Lɗ,;T��A�MS��STÉ�~k���8H>�l{��o�J��9�+n6k���&�c-�%��<�&�.����w���������h���F��3�e�����kjs����8�%O���Y��"�$z�Mx
6�]o�1;k���B�s�$S�#��gg�
X��moR1;'u��i;N@⬅^�fd��h���5��e�1;�v��ˎ.�)�॥E�T��T�e)��ʒm�.;��"x��z/����`��Od䤐��bX?��.�ڙ�s���mRucXmu
�����Z  `C�0i>4�Z�Yԥ&(�R!A��#�o�䍪�����]dK��߬n2�=',ͮ�3E[i"�9-��N�ЏR	���y���PK�K��g���B R����Z
�Q%a�>��`�@���AR)���ձ���ۢ�a3P�YU-�'
�>=�qon��w�	�b�����q�p��b�w3}+��ȩ]������j\���������o���}K����O�͌[o'i�R�ٱ׭�]u�Я���109ے��rKV>���2@c1�qZ�=sJ�ºF�!?��ZZ�I;O�[��e܆E����R��S����^^��F�b@�c��Km��N����A ��u��Ukk�T�4��T_�i�0k�d#���Bi:�VLaF_���BI������:��2e34�y�x��1�0�K$!��4�Bd�!ڤ��g�p���@��{���	?�@�h�ՙ�4��:1ǚ�l��gRc鬴�Q%)#s �4�ȡY�������#gH�6N&�1��:��!(�❑qsD˄*;j��t��r�����U�����}%�em;j���3����JF�j�J�7������O�E�=��J��S4�6\Az(�r]�R%�]�6�T�������3T]���[���I�htP �%yqu�������y��CS7��}���k�����U^'牤չ�� xz���m�g��:�TQw.�Wzk���"=�[�%D"[R�krop-;��O3=�j�(΅�L�*�*]��d����'O�5�u8}])T�iݓ�0�H).�����U����5X�Hv��"��4Zn�p��%cV�4x�Yï�ȳ�m�C��\B�F^T��AX�\N�e���z!_�<�O3�K��A�!I��k�y�G�����O ����J�	ڴ�* ���߸Y�,nf�Ʊoh�!��:��N67�N���f�e���ovV͝!G��b�[P��<`{��.J�d�r����B���eƽ/�D�!�M��{39r����0gP9;gNX�����������ś��N�cc���0EM�V�F"s��'�;-�>rlOv��J�^r����c�Fs���?��B���H�=��q��șZ�TA�����U0���˻�A.�EyӘc�1J]~�5 F���S��e��$�vdמ�Z�q�D�y�u�ҋl�	&As�y��#����jq��+_��k��d~�1��_N��D�ΡD'��2�VI^�4��$��%��!�A��O��c�	+�ʫ��4�+�c5�{ u]��`�v*:Յ6��f�<C.'������AK@ݸ�����x
*� ��=H�Ͻ��b�e�Ϡ�v&Þ�UB1���܊�.�"oK\�V��������Y�v��*]�Ż��ߝo-�T�Ǎ���K�h����\~m.Sh��rM�J4$u�+Nd�_ο�c�����3�m���W����em��������y�on&���~��� Q�q��$VPL�w#/��e5@�h"g�{*��H��n)��8< m[��`�<�n팼�%N�c7*�SpO��2�b�PPa�r�K��A�o��<�l|��f ��-lZ4{�hq�5j����7Iы:w*���#Bt�qg:-?���e��ǇwW��W�u��/��j����s���J��2�0[���K�9�O5_6��{Lu� @U�����t ��!��
��g�YI��+�<<^=���^����l�笛4ԖE�E&�З���Ƞ�����X֌AL�ZN:Ic~om�Ղ?�e�T���=IS�[ؘB���{᪥t%�$i���j�
B�U���aUC��
`�PGҒ��� �-a�²^���HNJS�R�d�7M\:���������䠰<����8�Ls�a���w%C��%&K����y�m��/�2��AGr2F55�?�Y�nX4�{9:͝���@k���Lx���OY    �2lI_D���+ԍT�CG;�e|�Y
6jP����J�g��{�>$;�SS��H�p�dy��2���Α�9I+��_~���]W� P&�"Ic-v����5���ͫ6�~�;iq2F��Ν몡`��}��!��v:A�װ��+�8�}��v��K<;J�K�3.�$	�0OJ�8�m�@�B�
[����&f@Ql�NJ2@:a[�]���%ylj��Kfr�5�(eR�i�neid> �Z.����ʓv�r(�:Få��+�`^�4PP*˂�I5yU�u�@좔����1B��^k�s���h Ӫb�(�^�' ęԳ�V	d�3�jk�0oݞ��"����^Z�MjF�M2��!�.�5{��9!�\�mnJ�/�fh2�4I^�7͓e��>�u��2�l�尩�IiKT��<��3�������~~&�&�*��:���|���vi�#7�dOw�=Z�,����ڨ:m�$�����H�z&���Gn�`6����Hךύ @�43�����;��ky8?[譈e��~�p&!e�/�t��*cp�����~�E���S��u���(K���	�-�kS�ce�;T�T�����g��'��6���d9~��{j������Oy��و�L�q�L$M�d�����38+�j�SY�s��s����4Ra*�].aâ��sԥ6gK����
~ľuΡ(,\�[�/�e@����U3�hs���S�y��le��������WyԮ�0�{���۫��F7��1�&͕#�|�ӻ���a@ӨVӯ:�f��I�v�*"�w�Ai�$B�* X�/Wh@��s��������	�y�!�՜�������l�]OF�#k>���I�\ae@�$�C?�N �N[0�%�����v�C�<��$��1��r7�K7M3��X���#�^�=[�`�R�V��$����V�V��`�uMm��3�ހ~��9���-������X:%¶�Z�#�~�������'H����>���ޅ
LH ހ`�-��I���D7��d/� 1�lZƞ�},�tZ<�$�G�t�B�}�M�IU��T���ֈ�!m���;G�}<pX���Y�+�<k���	Z>jo4����'�ߵ?�=M��Rá���(���R0Iy�a���Q�vh����a�zi��ybԡ@D4�ڰh�9��3�=H|�4�	���㠞�ˢ��$�<��W{B��ڌ.�+����eBw0,IQ�[ a���II�_��s4�u%�2\1D���
��o��#�9������#66�5%�zk��$2_&Ƴ�J:q.��gm�+�V�A�=�Xg�	���J�VɄ/�sPP���|��@x&�_q��q��QJo{[�V��&l$����J�6uL͆���4J�&��׼�δ�qs/c���\��]�`mނ��$}��6���2���H�ARy�����f�͒萳Lzq��5X�zX&:QE(gG�?�{�(X%�.�� |�k��s̀G��/闞.S�į����Sc`������	�Ü|ا&v/}���zw�e�ٮ��?�q��SY����cn�7#�~��!Cr5KU+Mc�-�x\X�'��뷓ޕ��Z��z-��;eA�`1��겧�8�쏹�9���j;N���4��Z�����r��<���/D�=�.3ȥ�&��AD6�Udt%m��\�G&�qN�2�s\	s��M�!�@��4M�l+�DYް��^w���p+M�L*2�BZ1�y�`�l��Q;�#_S�s=��tl�P���B��)Qr�ky�*�� ����Վ
|��!A����ˌ�J��e^�4e@Sfu�>�T���DOچ��ܸ������	��Nv<���'�K����B�늳ۚ��)�<J�8|����y���y����	�3��J-��	;�X��=�͝E<rTO��NI�^@�ӾR�&Ԝk�J��cڲ����G��;�ڮ�k�T�R���r��D�j*�_�҈���_:��k�!O�眷Un�t���-k7b��d�_�v���P9S =����)�Ra�s�ч�?�x$�j�N�OH�l�Wkr��I�t��x�u�+�#��N�XHvL�	�M�+�8KTH(���mG��4I8�I5C3������:\�*n�Bm��-F�X0�Yݩ��S��(�X��^]nV@���m�{04�{<��Jʻ�J�8q���ӱx�A����l��{Hѣ�I��O=���IO�.z�e,ך�\k�#��k�I^,ۀG#x;)$�N��7>�Ōd�w����`a<���6��CCa��$9G,evd�u�k��y�հ*}�cy�Ǆ-��?|��p�v{h�G�>f��͒��LX6��$�Gr�!qo��%�!g��ד�H ����ȐA�����Ϋ��5zw�x�~���lT�g04QulYˤ3�r��'(���d�$��$�t(-(G{M�QA�s֚&���nY7�2/�|_� y(F��ï�ܲc�l�e��F��dT#��ՓPjp-9�Z�S��T/%TaD�/LE-ʞpq �Aנ�KQR%��X�m,��yӢQˮ^�����rZ*l � !@�C�5J+�6,,ɭ��Nc�����h3�ؤe���[�M���h�Q;1�%��` Lj�uчԱ�QFp�5�<�)��T��T�'b��,�Uݗ:����Wti$�juX��C�o��)1�Q��-X*ی)Y�$�Ȭ9�ud���K�TB��-�m[�PY�S���n�6$i�gP͡�*��%*����AZߓ�n��ŤPnӲg�h�fN!v�VG�ek�K��2uIV�r#u�N�j(jt����l��{)���_O�ʍ�S�<ֵ�Y��S!C+�������;oN
�4q$�~2���泖�H�b�*�o�6�L����*�3���PV%K����Ac�p��C/z��S9�GI�ѫU���P�Z���b�D%t ��0����eG�����M�E�[ʝ�B�h˕�$Un����a�@W����% �bgI��S!�j֛���� {�2�\&��#-�|r��B��R�M��>"\�s�@8�Az��1�M/�!��L��d˙�9�1i�X�\�U�h6�g���J�]�����&�r3W��-I�t=E@S�#�I57otD�i�lZ2�_��G�bC����y�}��m���-��tv�0e��9%I72� */I�-�xD�,��K+����ɍ��W.jܾ^�L (�K#V	�!��sm
n�9I���S�S��g�.&�b�n���u�@.x�ei���9ߊ^w�g3�������uY�� ��:��}�M<"�_ʺY�x���\c���A���&�y�Gƪ�6�=>��0�ul�]�ԡ�*���|�G����y=t������)�v{đ(�%S5�Ԛ�T�z���k�x�$W���`�5 ؃q��a�2�j0,J͔/��&�r#�ռ����jU5ר�tcK�Fy�7T]ZNd���m��]2 �K2�D��TM��fK�U�ݲd# �	�2���������V:�ʲ����*72Z��:��$�d4����`���/uݖ�e'�r���\���dHq�NP�d�����5F,]������I2[2[�w����c�oGS�+y˦� 0�YO��G�8c@7hF	L�Z�j����1(�)��+&�^����F�lu%]����^�{j�n� �YKu*�hЂYA6��@-��&[����kE�fmՉZ�F�%0/G.h�}���n3�Eڢ�s���W��8AM#2D��W�aC�� ����Εp��!��h�蹱�5�؞��[���Q]��֣�Ŏc�t��{I�������zbaފ��l�7Rt�X��NEi�R�W1-�m	��y9;�{��u+�@�˿���+S~�̒ʻ=j�J�u8 �^("�L?y�;������5�G��?���u�.�y㠒6����*��Q@���P���0g  i�������U�=�3��$Tk��ޒ��[��G�ӎ�s��������z��Ԉb��2]    Na�5�\3�` �-, ��k��/��k=\>����]0�C��a���g����&����}ݵ�
YS
�J����F��zW��%#�Y�s xn�͇��7���v�B�	�.yӂ�����T��D{���h���=ٚj,��4tN&��	dt�*��=�ϒ�x @��^��ty�x����}��ߗ^]~����ݾV���&�Ad��x1� �3�¶q�g2�KS�^�-�>\��~x����ps��_����zs�����G��9l��t�W���4E��,� �,l�o5��@T���q꜕�I=z�CJD8��T��7���~n�؉��s�� v����%�2U��LX�2��H�7����Gx�S�V�o�'COM��B:62�uCp^Z5�r���@ĝ�[/$a���W���f��h�̤l�:��%9Yg��®��n5�G��s�]@�Ϲ�{gN1�,=��P?����n�	g�������!�ܡ�.���|B�o��m����b����ř{{s�p���7w��o����U�Qj�6rU::���2�O����s`��^��^6�7�?���ow�/�(�!�J����$I�Qr�@4��#2|�p���y�۫�.��n+G�%\��g�2�W����ض�-[3P��$�=�y����������׏�����,�}�7�2ȭ���+��8Y���9�Eٹ��In.���B�YS�ɷ��"���$���g3�~�y������_��F'���aM�4�����
�0�[k�4�M�gc{��d�]����ܹ*�J�&[4��$Z��KN=����.���I=�^����9iV}mZ�8 b�SS��HsZBɀ^L����\��[�vu�g
փ)gp�F19S_��`nNL;�K���S��&6�TŪ*o�IkC�,�:r��0���˫۷�BQ����������oD;����n{�NP��Y�1B̝�"�k��I��4)Ŭ�&e����X��/{��	IZ�r�W�<�q������)�b_����z{���嵐Qp�ٛ|������7`�����߾������~{�rTR����>��y��X�������>9��=��ͽ<ɮ��͇���ğ��z01N�����M*�8�N?�fק�ߢ�l��B]}�����)I�����7�c��$2�D�Gˋ����4;r�/L�fN��-އm�`��'c&ߑs�Db��
�- �FJ��&���#\�Q�vyDl�����=�m�5� ��7)��y�֬ݖ	���Z�!���Atʨ�dG�jZDT��}����i��-8 �L�(�2�bCD�&j2F�tE�05���p;^���\ڪC�=;�ͥ�Y���ڡ�6L^߆�j��S�*��8Rh �I���O���x�W?�B�X�`�
NP2�ܴ�.!j�A�l������#�(
�с���'ĝ��Tdpm���8��.�99����{x������/�K��A�YFϵ���Rz�Tm*j��F�5ɘJ���sY��~w���v�j�n�����2���֕Hi����=F-n�=�av�9k\�P8��z�G�`n��a�]G|{s����ۻ�����ղЭ��'���}���Z�p���7�7�Y��À]��yx�����w��os%u�Ė�O6���X��C����v��YkWH�i�^��s���)�`�]#Y��I��~�v=�����ax��B��p��x{{u����g�x��T��S��Gx��ke!�jd��A}�����?���\}��Í���_m����B�2����*D�{����+����6�3�v_輹�����`�r�x���a{�Ǌ��G�l�`��`�UN��^7�4�c�yۍ�z.�n��4X�sd�7����P;��v[w���>����u�><�}�|{���v	犓|�R�ׁ�i�7�:kH��i��p��n�a���Z�����<>>�&���Ѻ��S�'�;��_��Y	��e�u	WG����[����[0%�pO�R�+�}ޔ��=Ϊ�1Q�@�?���y���L�"y��^(K�&��<ﰰB+V��kɧ5�4�i��Ҁ��^fp`�z+\�������a^x�vX'����A�?+%�Lp���&Ŧ C�ɥu��bXR,�>[H���o��#�X�W��=++u+25�����Z�*&J�u�,��Yv��A^�aa�K�����P̸����w�&�2t�NO�)���d �vi�sV<0���o�~�͜.���t�2�ٖ 󱣔�gJd���y�jrz8V|^��y��%��jx߷��>
t��I[=�5�R�,��@x�
>Z�0m�='���~� ����oﯯf
<~���G��A��j4�6ZŠzp�o��������25A�������`
�k��@2Z$�b?c�Wh��u~gÑ�M����ü�����o��ao/>�_}�_�M���(�k������Y��@�3􌑦�}a� `��� ���0�"�Q�I^VB�����¼<G��ݳ]�s��g�`��ه��Ҏ��)0�&!2ԅ1kGp_���O���=<n��K�IB�L�p��\+i�Y�����YkG�v��^;,����~|�x������ͥ|���k�UQ��8
�#սV���$�=#P%p5 �_�8pmd��h�+�6�������*pu����L���'�ej�d��'���+������g.<�=�A�X��{�
�{e�דh�9-�D���3��=6x��j0a;-���~����u�1� �:�	`�-L� �eP�<?/Vfko�	��;�85W���u6��&��������Sm��;�^J���dH��/#"���z*cس��C1Y��?FI�M)gX-r�S���I~��3�j��[����@�lrFk��0��s0�-�@9�e���^˸�2�Fۙ������ek�^7 rd�j��M�5������Ή����BlP����� *�Z�Q��i�h竌z�I[��n�-1r��00a�UsX�M�>��r�1e8��X�ߝ�V�X�]W�*U�i5)��K�7��'���=ޚ,��Nٱ�R欵m�R���سQl�i���go�{s}��l�|�X.�ڔ��2��;��t�ciR}� �I f�ݩ_/:�f^�������)��fi�Vsc[|�K$,�����n}m|#R��R�qT#�4h�a���~��#��x0?�|e���7�+V(��v��?=�/���s���4�rVժ���2��.�0��	�~�Iǯ�i���$8(֘���t֙�²����FawZ����°�{&�$��J�y�ކ�d*�L{M��f�?;ƛx@��v���}�V��e$��1��P!�|)G�c�l�@�������O};<� D��a:��1��\H2�����G�y�	Ɏ۶O�5�^C�����Շ���wW��n�
1�P�>���V��Rt��"g{�?j[f�+P^w�� ���S:@g�Z�!��Zt�5"���İc������������j��W�؆��[�R���L=ȵR\����F����MC���S����lTЁ��w�V�
�ǔ`"�ڤ:sq,f#[~-J��������O��kչIo��&�x���vu]�������~ʚ��L�ْ��� fa�9s�}Q���سl��9��V��F۸�$0Ъ�T�v��T�@�Z5U��Km��wzu?��N�z�'`X���G�|]e�VY7���Az���Wd�UMM��+8�͞<8�~�~��,�~%�e[��Ѷ����������ekL��P
��Y�/��6�Ys A !����`��J	�,z�k��J5�th�M�0�|�����W��N�W'��y��56�w���̀V��cJD��"��d$�8��m��ͫ�
��Ϳ V����"e�r)��54��4F�*� +�M&���9����n�S&4��6B�����W�Zk���T���9<�{    ��q�x�-�����/e�6;�;�m`p��Ѫր�x�"_��	#S�* �cܫd�4����9:��qI�0)�������]�^3�bκ��)V�EEYk�o%^hR^����a�����Y������a�W������ +l��4�5Ћ&�l��J��w;1[MI�-�Z�X�.�S�e�mY;��Nl���H0Iܶc�y�������+�Y� ���RcƠ�Uc�M�lH%��9��"l�l#�RC���4��nJ�)�u�#kL���"�L}]x���^��s��xI�a��}��+� ��^x���#�$�v�4�7I�����k�X�Mp��Y兔�R񦲍0U&�c(��J١�m���ax��
�����sXX�e����S�]?�%Z��v`9Vb[}��̨���1)�{'n�q�im0���|jj�U#��,�J��Pһ�bc�Ν����y����`z<lq	� ���U1�?�Ǜ�u�';`��:6���J�e#|�c1�?�ֆ���	a1b�]U�a�	���	CX������Y��b����63
tK�@�c̐��N�W2�Q�r���)H�:^.�:���o���'c������������mBY9]���z0(�`}f�f�&����m:Ԗ-T�|c-UYq!�|�U��RykB,���c��SC�7�p�m��*2'�3f�g$�Q%xP�\lu��~�W(�At�����ew����禸H(��W+�Dp05զ�ϳ��dxej��n���5���B �Xo��nd`A\	�d�+�9Z��h;�u�#m�+Z�9��E���
c�OY���E�V�-M����mN��yxt0�$G��v͝Kد[i��7NĲ�Q;&��2��H�M��U�^o�-aS�~+(j�Z8�X-��Ȍ؀��rpG��S|�dm����N�֏A3�����2�׶�u�5Y6d8�tx��e�%x�vXW֌G�|/l���:V'�C�C���$����Q$�dpz�&�V�f"����j������j�\��DL�;����h!�` ����aS��+8��$aRw�W�
�-EP�z'��� /�*U�SQ��1����v$/y(3�
�e��WZ7m/+M%F�{�^~��>7�g(U�R�E?6TL�6�҆�!72��_���F�p�-��Z>\���E�aW�u�y�|-d�R��+����,z���u��&s7�8�� n��5/��/�vg���� v��S݈JG�p+�����3P�LZ20m��?',n�M��i��+� ����x��d6�(�I�y�Dݷ��׭p5\|�ED���y���7"��m,�/(�I%�B�TN9�lJ���d���op*��2�5�p׃�4Uñ�pSn��Z��tD$M*��;Ԛw��
�S�`��p�Z|]�W�Ռ#Z�B/��2](`R���"�s�[����q����.�Z��x�a�B��
N[�]A�lٜ# ����cC�b7'm�E�V���L�&(�b�Η����"�h��KJ3�=��8=:|��V�)�>:�`��PYl$��9G :l\��赻�wX�0� ��5����q��{�X���@Y�y��d~S��7T�,DmU{.�M�:4��.4V]�Z�~�N�S\��^w��!R��#H<���wu�JWr������0Eh��<�2���V 33��@�������2~o�Z�=l(�#��I�r)$��;�\�^x����ϪkɣF�����>ߤ�-����Wt�=4�`3jk_��ʘX�06{�*0��D���ݎ]�,��`+`��g�a��&��T�v��*
� �C7��{��C���θ�M��R��Y��XHn��a��{�`����\k^�<7���ݢ��B��'�N����å�WgƂ��*��1�-��/R��h3��6IK�����������o@�������QA����yq5�^}�M�%B���7J�2Uix> [�-M�m���'+P�x�J�y�m�F�A��8E�|�Wy���U�jv��X,�K6<��Z��ĕX{�f�K	pƤ�6�R�{��ض�p���6�>Y�2��^� e<��(����P���f��z��^7��7v�6� ��JVx	���HM^+���Ib������_��/�Wh�Ύ.{�4����(��,����d�����!��T�Pv�,x�����^���&�yuT74�Q�c
c���x)J���H�kY*5��뻟R��#�o�n�z���Vk���@�$x�uS�+�����bU��JV��5�ܜ�,&!e���-HG]Sքs�5/}-�g�0)l�V	fJ��=�����<�e���c?�$��VG�d�M�me@E8�F��s,1�gbq��$]٥��g����)��/'k5"r�ɲ)%�> pLK��ľ�ҙPdpR������nڸ$�������3�����O�����+���6
L]G��0�&��k�M�x�J6���Z���<}�8�}>����.dd�k{_K��&#�Å @ܵQXri���'�CEx��[�ߛ�%�^=t�>N¿�;�Vk�����3 �Jc�\�y%�)C&0�5Ձp�6�-�h�.�i�
S+���J�|뮹����*ع��yY3	��)��$T��k�{��;J��ar��VZG���*����|���ˆ5���v���/; �k"��\�_�;j*�ib��0l)�2�OR]aD5��K�͊-��������N�ʷx؇m�;�<�5�(\`<��J���ޝ�1O��E�@�U�b������,�[��sＷ򳕖�i�����J�x9<�*ܢr1%�g6u��L'��nM���x�'�v�u������Rg�P%*f����=�u�'�| N�`Y��D��t^0e�e�%�e��9�+#��^ܟ�)����jP�98��w��kL	]T�d;�<W����?z�%��޾�\
_�n�ʄ|	v��!��B&���ah�L�n�oN{��5�2�sp�#/6�@N��hd�2�������G���D7�p�"ЏJlS�j���|c��/�ͤԼ=��ȶtW���F`��ܕ�H�īh�X��Zp�Mּ �$K��Ro�#�nC�d@yY�U��
����g&�:��3�"�6���ŶA�͢�ZW�i�m4�T�whCɅ��,1J���GI��z%}em�56��JrLے1�4g`Y2�h���~w�q���x�C?��/��~z�w~�Տ�q������{i4�di��`��z�0R㧱x�����8������0-�r���_�ѿ��2�n_~:ߍ��b�%��Ss�99/f�"�o�n4��ş��_�Y��!lnO;ޒ��|�F��MS[���c	Z�XM�a�^�`�W�Y�F���2�_)�Z���/�����oXE|�I�%���}'��X�x�pt��>��X4�i��u��`�����X������>����d�g��1<�����͍�iʚ��
a����oq�Ϥndɔ��e��=���`z�ǣnM~�4+��������0+$cő�84OC4����o�Y}9���8M���������^����[_Ӱ�x2�qMp��Fq�0�NjMI��e���??��6- ;�������[��+f�O�����8x�_�¯���?�xq\�N&c�?�	N��짥<��ʿ6�Nҩ}�p&��	(ܽ��OhV��X 8iB�TĶ��n�����e��0�v
��w�o\߫�X�M��Ť)�c��`�Y�( )'|wā>���h��fŻ��,���M:N��R!Y��e�u���x7���#�������|��~:��0�KO�ɦ���-0�M��1ƾ��d2�:���o����*�R/��7ߠ$%I�RԦ��R G�9�6K8Z��(e���T���y
�F�..R����|}��w��jK(D	�R�`��[/��2�;��!������   26�; ,78����tLu�QG�N� ������m�"�.K_o$��dЩ4�%��v`��bږ̑���f�-���s���w�A�g	�,"���! �̖P'�#2b�r���8��ᮦ�[�+h�=g���n���֓�����#��`d�,�:��l<l>օ�����@Ξ�;�a-�M+Fʦ��C��Ӓ�ƣ�n�j�#[��i,���]��`�YqC+��<��F
G��J&�쏥tb!�.8_��%�9�y&��ԑ����T�ul��⦶P�n�`e>�]��w��K�9'cd3,��J��{X�7h;����&���iwa����4�8���IK4�Hq ���ؤ�������x��o��p�=�^��8:��I���f��c�y�$L����J���ε��aYX�V�ey��_�|ؕ�I%b)�K����{����zX�r��Q�T����`=�|8Y��� !��p��%�ݧz͠��8D2/�.�R��$��GH5�꿂v�D���۝=�Q�/־����$����t�Ǒ�M���>����j�kkb
�G`�g#pk ׊�\\������S��~8:#��7�cڭJB)�bG���ގF�z����]�o��Y"kӥ�o3�/6M��e{� �iq:��Q�\\����{�N�F �c)���Z��� ��h\ �2�s=�O{�����pd�1>���X��&W��h��"y�d�,e*�-rd���||pb�E��՛���>��F>|)���H$��&,��m{q�3�8�i)�@���n4��V� !��!���P3"��cS����� �͂;g{u1�I�����:$�XC&(�G��M���p|��=�C~:n�4�38IDs��I�);Nv�z1���a��xW\����4�zTƳ�������H��#cdS�!�e�.�i4���3 ������3c@��R���%ֱ����փ"�b��v��"�H<(�l���$Kb��!o�x(�/�؎�؋��Hv����c�TMO�	�ߠ$K���qp,���TW{@�L�"D$E������/B�������䅑�p�ӎ�A5�L�>����#F�*�����P�o@6P�
��_AQ���q�'f���$忸�v���ǦV~�8��;�q���<X�On��Peb�d���R�.A����T�Q��������L��������s!�«p�ܑ(�id�e=�ѷ�[�J�OK��"�4ct�Ŷ������Ԡ7���Օ����/�8�!�NG3ز���I��R9J'Z�^����镗{�������'d�\J�6�����fl�Gç@U�������aO���l(ч��o�]�Zr�9/���W��"�E8T��d��R9�3�̝\=�ۋ��~�J������ᨹ� =��%>ϑ?4��V+b(H��oy!	����d�Gφ~&f��j�n#�;pR<l)�-Sk��D%���67�w:0�,=��r[^���
�3!�qr���ϏE*/6����:�.S�|R|��B�q���|>������YZ���l�졤Ȕ
R����-���q��m��1�O���Z�3O9{8)�<S�;�>��������?�\��x�����C��3��ňd����os�V8fR�1H�E���F\$OC�t��]��o��+�e�����P��c ��<����1���l��?�K5��+����.�ޟ�x���d֓Uq��"w���~�ܦ�V�d�]\���y��SĊa��L�~-N��}�q�3���x?A���di������?����S^O�      �   m   x�3�tLL)��NTH�+I-*(�,N-�,//�K��#	�%��r���Z����8X�Y�[p�F8x���q������Y������r���Z���Tr��qqq �+        �   �  x����r�0���S��Jd���1�c{�=��a�d��o�Ŏ3v����~�}�����)!��	�PI	1?4�p���ػ����a��lU&�лA�	�K9�b��.ǗCiz�t�m@{Sڕ�5E��4w�ǈ�.x�ޙ��N���+&BN�x<��D�?��i�4��:�� �W�e�Pu��*0�[�|{�La��Ee�pSE�i��)�RUT�܀��	i+� #�4~٬�~]��	<�l���~�4�I��UzݎK69�����4��%���@�փc)��u}x���
J�����$ά9:�V5۴�N>f$i_�������tQ�����A̞�3��VƁ'h���,I���l��^|�Ɏ���z?�,i��!i�4nݶ9�Ϟ��-�p��d*1�
#(�=b��uC��:���(g�1�2k�k��g��ݛ���W^x2������y $>�      �   �  x���mo�0�_�?�?@5�'�_�jZҪ]��N���<hA��i�~w&Q��U�����q>�<(�z��V[��M]m�mUo�z!�ll�1(Tz��dBq�4P��J��W��X�V�����᩿H�Jz6�t�ͫM�C&��<|®���N^��U%6��ӒA)��!Q�2c8%�4���.z�fח���q�>��S{ͦ��D6�x���͞�*˖�"���l��Z\�v�Xg�z�:��N��X*:uB'��CL�~���x�����°�KV�ߓIe�0\E�Nr����*������:���2��It_�~vX�����P^�f������������t�1i��񼊥Xy8%��I�E�(��
��N���a^ȫ��7��~��X���1/d��]��`���g��>>����e9ȾD*��C�N��B���U	�BL���U����A�w
�      �   �  x��T]o�0}��
��U�/�m���jm�ӤI}1� I0�!��_�k{ J�M�!������cG�|��#����n��j��sժ�x��Z����\0���A��r�Ȅ����WH1���PK1�B� �^���	0��(��Q�ҷ�^��7E�9�,@�7O�<1	��I��m��pc"�_"�1"g����0Ŀ���k���*�Ж����3��Ï۵M��J�[2��L��N�DŎ�����掜.90N)���uD��ϳ�,�U��63M|P/��W�ʎ-��)q�$���S��.����0�"��]eP����P�<#��M_+R�O��p^����,fE��ti��:>�S����'��v�s�=v8��e<V��jM��V��)��2I�\H4u��cP�RW��!G�V��FՖ�٪i�;|�!N$�Q�4�.KCv�Yj�7��#�$G�		?T���0�����/�2��
��Ոa����Xj-+�o��/��n�����=�cW��1�,u�r��F�(��	S��+��ь�Z��>n�+�yB6n;s�+���Q�F.�fl��q$��I����d��z2�1d&otA�͏�'(!q�=w��U ����      �   Y  x��QAN�0<O^�T�;��p�J��lڴICR)i9�z&M)X\:v,{�3�� �a#��߶RoX�o3g�	w�N�����A%�@i�U'�qў:���c����S����v�!J��a�lG��Z?�_i����*�%؅O�ց�y���x|�ɬq�b��)�MMo����1��8�B�(Z���l'uU�rQ������1�A{��X�l�+~Bqr
}�.�p3�ä��~��z�|���W�r�����l4^��6��C��ϑ�E
S�n8|��1֞O(z�7�����e4�M�C�p��A�ϙA͇l+�ƢʆRc��j�2�#��e�$����      �   5   x�3�t��u�4�2�s�s3�9�C����C<\�����pf� r�+      �   e   x�3����S�M-)�L�4�2�NM��KI,��9=2�3��L8C݁�)g �2��p��
X���;��g@Q~zQbnnj�BJjYjN~AjP"F��� ��      �     x���=n�  ���"�6���K�7TU������(a�$��|`�����=���|��$�a���'�sR~>�w��s��jfI#���L��0<����e|�.���=Ҩ$xQѨ��|X�RY�Q^�v���vQ=)�p00mp��9γ�.���\�J
aQɨ�T�P��<3q6�.'�ԑ�"*�2Y�|�h	�[%�/�7����*1lll�`���^��-X��pV�z�����订���WE��a� g�,�      �   n  x��Kn�0D��aQ$��KWIa���˒��mR��(�@��<��dv�P��w΍�饪y�0�N��$�Zܴ\��2L��s:L�xhL��h
�4^h�����kUӆ3�փ�)ݝ< ��ք�N���~���աl�⯚f3��M�o���^� l͠%�G���Z�K���/S�M���_�p�&���d��<k# I��_��Q������|6jA�-"�o �AB9���0�S��݈�:!���v*��(��f���y�UF!m♢���}��:|�����;L�s���{"���^e]͓tO1�=O,��$	�Â��=�≞�D��j�O�}z��{��������e��+���      �   j   x�u���0��3o��GK�%���������(E�i�3=�Dd[��T�d/�'u��:�SLK�I](��;D1��X���{�Xz�q�zY��a��x�° ;��.�      �   �   x�]���0�g�)��៱B�!ʄXB�H�&���'e���ξ����.��Q�� �8���s8^J��V��J��s�'.�m^d�3X:[88�;�X[��N�-��rq�14���<r�L�+�*����&Y����������J      �   
  x�mRMs�0=�_�c{IA�`���3��1Lz�EkW)HIv����D��NG'����~%$��U(q��DKi�sڐ$b����ֺ�y\�G�����^xo�� �O���,���<��H,&����,�mA��'���z���c�	�0��8aQ1��蹜�$C�:1`��7F�F^=G,�`h�0��B9�����)N���`6���.�pZ����-C�{R-q`8���5
�0������9�|�,з�`���d���W�T?p,X����.+����a���;G�9�pF�j��h���oš�e�X=�����0�0�H�;�ɮ�7�6mQ�^o�wǣ��Ɖ�яc�hJ}t�� -�
���J��U�n�����o�U0��d�è��_��3%%��q#^�(^�uR���V�е�S�s�KL�I��ʷb�Bk�r>k�(�@wq�0O�BUk���g#]�O㩓W�`�aGҺ�S�&SōP��_�I���M+�`!���J��B����~E�o��Q      �      x�U���0Dg�+��.�X�ҥEHl,VbԨj@n�O�����Iǰ�ʹN�I������@*�B7�ȩ��N��Z�=�n}��\�!s��q���!��k�]9`����,�����R�}��_W�)�      �   �   x�u�=�0�����r�ܲ3tq�.HLT�`��8N��&������K���9� T�ͨ���f�W��ӈ* !"\���D�EA,��}9��{!��ـ��ۇ��z�����zL�s1���iq�0�C���t��9�b��m�ޖ�dú%t�\Y94�2dY#�����l�!
u۾�����Oc�;	��Pz��Y�ʴ�uS/��Z�r��      �   x  x��X�r�6}^?�����#H�-��Pd����I��Ӊ3Ӵ�����K&Jb˦����b�7������{xz�鑜ͭ�.��`N�m��.�6�'~%H�m�������R+�GQI�n��(4� �՜����0i*�<�����h�5�k2�sB�x�p�5��c��~ 0d����YM0CP_jA� aBGy�0t��3% �����qoLi��η�<����h��b{��	�Q�x��B�s�8<m��RKi<���f2^J
�z�o��^��ɥ�$n�;�tH��ipF᣸"�~A\��\�q�eu�yFA���$�D;FC��"DNBЧ�����������8D�i���y��,	I_�=ҧ��%�;9^�t$ԏ혂��'T����9A"�G������)a�������?࿀sT����|�2�0H8��|	M�E�1��K����E=x	�6E��ٓߵ���7ێx�9g��K��|"d�b_K��1B��� v%y�;վ�����r�}�u�� �0!�$q>d 	���	�&*}�;�t�|S�*hw��+9��B�Č\�t�	N��ɿ�^��!��8��(<Z�B:�6�U ��������Q���h��#�M/'�r?4E�
J�����&�ʝ�CUo��&����Oj*�-\X�%:�	�:.�v�k�`��d�n�����&�Э�;�au��VDՑ�t��jv�J�#'�i���~�n*���aB+�j�7|9D��2�%D�]�T
*��베<7.��AN3?*�|��@�A!�q*?���׽o`�[2VJ?`�|P6�E6̤��8�|�}��/,k���Zq_8u.������3���-冹�á�����,-$TI��C��m���:��n����}E�Ť59�d�d����1I!��f]�S���9BpV.'N
?�r1��Q��w��S��Uٍ�)d��fs2�o�$�b���I��WIb�̵�9�}B���p��	2'��ǿ���.�_�=1�B� �#��G���nɊ�;��ᾆ�m�0�l�}��r�{���+fC?>�]��G�wd�p��}�d���β�6��:��.�Rc(i�\N����ëͺi6C]�]�B\r��X��0�8�%-$dNp��=��v�C�c�a"��L����'��m�K�O�ge=��͖t�V)9BF*#0�^{�$T���þ��o�1[�\Hc�i4�3��Q�uBքĿ�
��]v�v�#��ƪ�23�*�1<5�(��W/	�#(FHd�|X�a���sǅnQ`Wu.ۡ��ۻ�vhB� !���d|rY��r-ŭ�Dݾ����~���ah�?|��w�cf��k��B���%�Osr�L"���|i.�	��l ��0Jr�"FE�Ǘ0jB�_�".�^���p	_x�g�0"J�|�1TB&���5aŃ]r1��HY�0"�1}	#r3�0b�]r3(��.aD4��ݬ���%��eWc���wr�6��y!��x}qF;�"Wi��rh�]��ۑ@=�����=Xj��P�x�9�H}vJ�t`����pU���42_h`&㳜%d*��8���d�P�������6�XX�L������ܥ:���������p�      �      x��\ks�H�����؈���3So�K'���H�wLĄ\f
������﹩���L���YBR���sn^�:L2�	�X,N�\�	�a���!Y/��'+v�U�3F��"��F}�=�G��$������E����2�q�HV����y�Ź���/�ܫ���9�������96k���>�:��
ƒt
������dy���xϘ�gq��eї��X���mG��iYM�W�||10
 68���LX�VE�b~M�gR��+E6�q�����X'/���6����(a8�|�ۄ�y_����0Y���kv=�?%��ʸ�V l��g���ح�����z��M�����j���s��K��i�[�7R���)xS�+ ��1�7���h���6�fMX5�&�%j­	Y�7~���f��x��x�n���$If�K��ilD�<.��l���(�a�UF;�^��"4:*�{jdDc�1Ɠ�8����p��Az`o<l�g�{�q`=l)�߅�^f�[u`^1��ہ�y����X.7mn���)|�Ǉ.�������p�	�`��q���4u�x<��F�=���)�4�K޷=�v��~����~�/Lc,^$���W�M�����[�pm����"q�Q��![�&-�,�Y����r������I��$���>�7���c~F>ř�
\g~�p2���{���__���g�5O�Yfi�7�g����َ���#�)b�v2��1E4&L�����{�ok;]����!ـt~������O^���[��:?��1�Ņ!�&��������g�i�Rm��Fؒ�$� u�5�	�,��Q��|~��E��cNǃ�O�4�����ͦ����U�C,�#jtr���sߵɘL�7F��Ԉ��=f5t��z��[����,��/����ݡ
��x�A+zz��A c�M ��1�1i6E�1�yw�3��Y"I��<���B]�/�\��xq7�_g�ݓ��Iѕ�D
��^�ݠﺞ�x��<��n��%�#����@��b�k9���M����˚�K������d,M�c6 ��7��Q���W,�à�&b���
�{Y���P�j��+�l�Wk��/*ꄽW�c+�Ù?�i�C�ޛ�1ܺ�-�oƞiOw���ݔ�/�t�+@�sY�hf]��L9o'�n#��זe,�,s�̵�S�n'�(�d��漇�n���m]G����8�@����m��JQ�_�A�{f��y��y�=�<��u��}5E,WS��ZKM'�{���`��j8�V��6�DMG�M�g����2O�����k��&�ʎ��S����� �H��7-k�_
�To1l��2�)35���aK��a�c�s�������J�X/��<�8@��(42!��~�(��z�qgJ�Y��O0sB��7����f������_/���JP�b���!UsI���Mӭ�A�I���
K:�EԼ�*�`�ӗ;8%M{	�d��{_`��53�iSc6�T������Q��z=��A;#� ��x���">��\1R)�)8�S��m���"h(�4 �ݗ�'��Ej�m5�_$S�]>d�k�_)�A.�a�*��H��`�ȹqr�I�#F
�"5��[WAَ���8�1m��}�Y�'�������Z�gۖ�[���y�i��;�s]�r��l*�Xf%�Z:n�b#Fٛ��<���R�bL@OV�	 o/_�1��( t�(�2�,"�N���J@��4�q贵~��h���q�U�G�������+|��'���|zW/ww�oo�8��k����U���<�&֙g��)���Y�;ι�9�ρLf�����Q��nb�O���z��L�)���4������8[j��E�sC�	�L��VT���r���^}i��ME����Y�ξb����T�eŠ��1"P���x܏�Ղ�^Hj�)ܭ1��e^�x��
�̓��Ho9e� 0-�����
�]%�<#��ҵ=���hlt�8�1���8�6�����Vi�*��y0U陱B&k�Ad�+Ӧ����Z=|�[�;^��,ĥ�%�������h�-�
�Ι�2�K2En�#'<P��� ��p0�S9tP�4�u���(��X�Pez�4&Dv��'L)�	_ٟ2`�R؞G�v�N�
3�L�/6	���d�ڡ�*9���R��*�%��L�+Te�@������9�����38|�r�AةZku~�i����l�91��9`�2��m[<;�&1���T�#9pa�ȑ/)]�!��ľѴҒ-���B�|3Y�T�p٦��M{{�b��*Ϝ�@a�
�����C�sѬui��=PA�@�|��j����f���5��Y����������O!eR�"`���L��H�8�BJ�G1.a�J�0�l�a?�댁���!�z$
�l����'a�l���� �*R����|��>>�Y�1m��/�f�_�Q]�~�2"zb�CN��Y�g��a��0I���)����7�D�a|�Φx�!MXu�S(�.2E6fc!�W��j�&�1'�̕��]YLr)EK����b~���q���D�RM�4L�r��Q?H	P��N�Z�Cϕn�@��%���Iz���{\z���M��.��]=�׍�jw�S�w�t�ޣд���f����ޙ�K9��pu�|���PﯰV����)1]�q��pnh���ݰ�3b�f<0�A1��R�j�(���Ǽ�$-i:Y�qwv��O�{LEk�t%2��侱�_���|� !���t�c���HpK�P��$L��</�&%�=��%@��6�@�j�n�i%.��3=O�׋����ˊM^VWK��Y\-^Dо§\$�w���S� QT��p�u�
ք�Zc`�;�z��6�m���z�<�z������ hQ��-��>u%�lvs�[rǈD�YL��*C�q�_Ɨ���u�˚1t��a;0��W���0��'Ңϸ���B�VFȜ�r��r���_4�-!��wk�����^�A]�t�5-�:�8G"��A�[;|k;�{v.��2�{䓒u�yE[.�0P4l;��� @�!zALep��[���@�������� ��W�hq�&��6�>�*����U!��Q�L��O��kK4L"c�=A�k����p�$���M������H���� N9	ۣ�}�9�,e��Zfe���M����뫛~LZ�2eaPX�Q�2M�VT��PH�VO�U�#%��>�y���JuSD߂�T��&HK����M�^���V�݀X��5�ԥ�VQD|��ZP�IH!�c�����8��s�[�}�������B;�C��SP�Ј�N�F�8h�H-vA����G��I�S�d�Z���(g�RxY�$��4�yr��Y�c#�]k7��[�ڔ#����۸�!�d�:l4>��4�jrQC�i�3_���	��>�%}Ơ�����n^�z�u��Z�_��a��h����1��P\
��۲�i���ƻozpfꞩ����Ȧ�&=躎O��;gO�d�\�JoO���˺��-�J�5Cڻ$�$�Ԏ�v?�G.� ���E�?ϰn�ݒ�yԏb����׌6j�sU�6��?-�f���9�#��T�v�#N���D��]�u��n�i9�A�e��=��?���V/¶g\�g�Y+�N	G����1�x��#��m�I+O�\��O�,^��'֋ߒE�V�)�N�rz�����$����?�V`o�rEE1
�����8u'��w�6[q����ˊi5k���jG�4�2���G|���^t�ZƄ�	]�W�_0��8(l�����ϐ�tX�w�]�H|Ӵ<��$���*����;{���]�ڊB�5m���loxY�3��{�1�i��#d��#�4��Eġj�ǆ���)�k;���83�� rխ��.O�2�AoL��Ԉ�t����2�����T��Ati����Tg�I�ORWK(3X�5F�a|ׄ����D4�����pS����T���N&��t����+�ŗ� ,w�0(�����9��j���n�w�z���ݵ�� d  ;�Ce�G�?>����&����r^�5�"�����}u���B��M@uR(~6�Lڸ:D��>:��b=ˍ[
��Db�\/��0n��8�(R�Տ{â�X>�R�OMg�{e��y�O=y��e�l�D��_�gln��׷�OU��*A����Y%���1s�S6�U�<ҹes��$Y%����b�l�o̔t���a5	�B�d6�t;y���
��!���2��F<@�P-�V(���M��Δ�׻��{�V)�m��:|a��k���HO���&�M��)V���?}1���� a{}9� Fγ�H$�HA�Uʱi�.�R�zv��xS>�3T| ��/T��쁠�������LΠ�&�Ա�4-��Ϝ?�Q�m�ZL�D�C�� ^�Г���Oa�d�m���-�(ΫD���R���7$n�'Y�N0C�c`%)�;h�G��Oh�T��\�Ǜ�+���T�H���U_I$�I�y��Ƙ�ݍ���D��;�ς���w�� �#�H��M�3���<�mkyL$|�5�t]U�$� �#}j<tA�3nn p�ݧ/ɪ����Xu��9%�-��_rk�����K���"����%�[�����ۦAjy�AC�fu���1����(�[%:H�6n~�|H�NG�CN��^_�6�[�9��D$Ϟ�M~%�.c�M�AR����2�vx���ȨZ��P[O?g�Z�`ױ�֎n�H)@��s"M�� ��*�GR��Q6��l�szǾ4��g�Y�C� �q�X���aP8��ɛ����GCu:Q�'���Uʦq�2b�������g3~;f�C��2�`�T��A�K7��|�v�q�O�W�⍻oª*�4���Ϲߴ�j4�y�����yz/K�������yi��@�j���2Z�ޟ�Fj��Բ� ��I�xP#�:Ҿ�瞞���F���P��t�����^���NRz�^�z���k�"k��#�z�z������F�̎K�/ԁ���'�p<��]n�7�;g���la[�|!�}�����(��e��_>���� �b5�h���b�@��<�8п�G��ǜ��M������\*��z��G}8zS�������zftB�NX1_������JX�Yn����1�Z�5q�(ښ��P��#��|a-���\Z�����+}�����ro��]��.���+ԇrSQ/��ҭ�k1��X�����IHn5o��I�hB�/,�.����	��?_�Ο�?=歓�������wِ��po�em��_�P��A�YQv�����y�z������Yt�,�!���.�i�Äd�g��c�Q�/��Ҝ�.[���E��O0��O�H��^��Y�3$�5��S�Q�
��!�~��_�?��u�-(,}�������8�v3�xWLXM�w��	1��>Ɨ%J�~p~�O��Z�><�6���=��"�= 9YS��X�q.r Y� 2���˜F-/��e3Q�w�4X'jQc�~X
} T��g@��)ҧ/� ��F�~�2�\-̙�z-�3/��5�Iԫ<��'?W����&x�t�[6���Y������zF�e�!��n{��4�g�em(�D��ne`���8;;��j�      �   i  x����nG��g�b^�NW��܍(K�(RR��E��a{7Y ������jRGSC&�0a�wzz�[Tq��z����ϛ���o�����O����������|��ϊ��	3kr��-��Q͕=����).k����jT������ؾ�׷�`�-U��U�y/��1�vʚ�oy�.�:�S��g
�Gk���U��PE�|L1g��Q��8cS����_~���3�V����Ͽ~���ˉe~���?^�=�Nը�U�iES�O!�5����[U�:U�Ryl:�|�u��=���0QըF����Åچ�e۲W5��#�ݞ$�"�ĀI/�<Ԁ����|����Q`[2�4rН}~�!24D�5�s�$^��L���_��q���툏LcĮ����'l��Emd 'Y�	H8U��)~>'(�"6dJ[U�_F��QA#W-�Щ���.x[���w^� �9K�8Ӛ�j�7����p�1;+��C�4c�����wݦ�?����溹������/ޭ���f��yln��c�����6+|��a���M�w='<����ɂ�̞U�$Y$B��,�[bX�X�|S�L#�lmP5xX�lD&�,�B���v��b�8X���cmipp‧�Z�������,�i�tF:1v)�����%ZMvbz��'
G��Tk�?�(�d#�M�^�����h�'m��!����v����Y~�����<i�'����nr�J:�U��;�D�ڛ̭��fjT�?A��wBBN�UkeɢKTV���XG����Tk�k��%|T�*b9^�҈jex<���*Ur<$"|���]J3���]��+�hyd�����#�tq�vD�:�qli�:�b����d�h�w�[޿봵��Kh��H��$�ۛ�V�z�	���j����������:2�ӹ$�A�������^��8*~��a�h��B5�+���$=�����I�ҁ]d��j��s��&�gR5S;3ᠶ��J����	�\�s�#�����j�Z����eg#��ns�)C���]�%�ݞ.��4{�x�1�xfi�z�J�A�Dú�νMw��i�e�jp� �r��_��}w�4��ѡ>*��F�Nۯ��,;��e�j�&��E�u�g���]̙yF�Y�%���v<����{�X������'� klBZ����m
w�çCc�s��{���z1��*s|�*�I�@e��@x�����ms��z���xvi�[����y!� �S8�`/GBU��e{q_Ne�J�{L�F�@�Bź�������5��w�������Ch�F��8Ŀ����8��qb+� ��L����=ZF�������Z�2458%q³�r
��窍Oݿ��Ct�X�L�#�g/��ɧ�t�CD��Q��,su���1�t;�Fc�t��6R�t�d'��q��3�B�\�V�@g�c���֨d��b��;*�xd�*z�&G����=vDOҥ�U5Нб��������m'�Nc�֎�E�W�\��O�d�ٚs�����"gTA��޼������W���S�f��� "`���Α#:\^�.����B�f,�c_}>}5X$����-�;�n���I1@K5V�`��T�J�I�-YWn�����,�����e,�AT5����=� )Ƹ>�����h#F��'��G�Ŕ#yc�K�[t��#�br��r`��d�R �L�J�D��(Fy�ƛ�>=�����C�(<�-UV<$\wx���8˷߽TC|$��ĜBD��(�T�����v�dDtOG)�j���!���m�Y���T��^a�UfP5��Υ��,׶S���`�m����H=
]��j�"�]�{I�2ȘT���b�W~��vݫ��ԇC\ ?�OgK_L��ǡ��A�C<���}�Ô�&[N�#�+G��jTc���l��MLL����8JF���c�P��ֿ�_�;��L�Q"��A߼f4��ʥeF\��ƅt���Ns9�p�j��Q��c�u�ٛ�|��%�Y��G�~��p�8K��'w�y��%���Z�Z�48�� �h��?�e�f�58Π�j�ÁJk���W��Ns�9�O@2�DU<x�C�k2{n��L:D�!�G�?������3P*      �      x��[Yw�F�~n��~��J���oM& �  ��O^hK�d;���L����� 	/�2��%�)�ҵ|UՒL���_+v���EaDa�7V����ޱ�y)�ĩ�O���zf��^�<QL�0�0|�p�U/M�h�h���33r(�^�<1��2��fƙ�����~���t���������������\�o<���y�`h�^�<	YԵj�j��oW�oW��G�N��2J5�^/M�DL
��l��=S�E��I�/_y����Ǫ	�����eۡ����yk�y��h8料�%>��4����8f��_3�D��W>��i��W>����q
z�S(�襁�dR9�^ð`��*
��cأu]�P8;�K_ͤ��t�p-����#�W����٧���D�4pƹ���ݗ���G����G�n7��Ŏv(�T�\J����4p�����G:�����~=�.�ГC�{i���m���E���˟�)I�^S�m�����*��G1���Uȡ�zi`��;�gLn5}
��率��4��xb�u��7�޽�a����b��K��P�^X��cu���l��K[�C�VV}���^��7�(���I4�����	� ���)"��^�A��o+��t}��C�6�#�+O�:�Ɲ�*�K?�`��p��K�R���p`�&!��Z�߮?|b׿}X}bT�^(�.Yx��z�t�B<�!A�h�N���
=8��nW�=��ç������߫�ۧ�@��`��V��L��NV�������	@��ZTu�#�K;�P><|�yl�����12EeH�@�^���ؗ��������]Ǚ�ģ�k���^�k��w1����6�� q�'ss���l��c�{�B����g:d�������_::���xz.f�6E��3`:b�W�>�1�_;\פ������4��'�h�����w��_Bb�zJ���u@�3�4p��'ٗ����yﺔ#�$Cu*��ptA��hh���?�=�7o'r?�6l��$�4�|��xӾ�WKxCԙ�������x��j߻��O`����C�7*lݼu��~>��B�*{i�f������qV�]�iIǳ�F쥁���`?~�r{�����u��.��R�����?`��=<|l�:Fv??��n�����������_:Z��'�����vʳ�ܶ����l�34���iC�'��hV�y�ڜ�����lR\�<�/f�U����RJ�C�N�,�#;Z�.�����")AykK^�|�f<O�����/���]�-�'�Y�E��9�����ŲJ�e�&a��L�E������=��.��Z�Ѳ�򤪈͑c���<�x�/�W��R��	�!�i�gť-��ǩ�|
#�{��@����u����ĭȊld����v����X���+���Բ*����ti�%/���8K蜅fK�4�|�0w����)Ԩ�K^kMX(�
|�Z9��(�
�o�x�fy���l=�xڌ�흣v&1���4|�xs=�Tލ�ȡ)k�צŔ�v�u��	&$uD(��v�5�i�b͐�?|������K�8����x�T�b"ێ���uF7����s���{����:єOXT릭=�^�BƲ9,�*�9����О/�Ŭ2�/���-����EV�E�Y>E�$=g��ß�4�5�U��\�b�<���)���M�8N(�%�	���|*��MFɰ�L��U�2����N_E�܍����0<�J�(�y^�7�����J{&��5<�sX��&_��PP3���e�˽�+!�gB8�(E���"��� �7�D�E���i�y^N�t�)ء�ͮ,��(y2���R��l�5e`�> A �L��n6˒�)q ��$�%4�z{eg�{�ܑ�P�w[�z�k�<A֛�X\�H\��$�hK��xؘ<�^���5	�s>O&�����=�Ƕ��n��],E��	O�2��$i>����ң��R��7Y ����/J�%����y1B}Bi����g��2Q�_����"�Ρ����鹆)�vX���.�Z7�
xU(ج�d�FVXU���@�Q(L�;�N�Tu�p�������rRٙE�8_�������__;�@�����NPfqP���d�Jxn�U�ċe�r�@��,2�_�(����@�@�ӽ4h�P��βE�=UR^dcwa���� [�d�e����].�EZxQ�#���s��jIZ,l�e��-�uQVng��k����;j���4��`pq�g0��v�l̒|������vRT6�t>� LV4�?p�}O�����OC)t�Z����.I.d�d�P̼(b���«�EB�B�G�A@X-��T佩��6���>'F���*���K��%�=�Ɛ�Ix.��K�M��yZB[1hB�8�.ݍ�~o!di6Ff���S5�:�7b�(ӻR� o�K��#Tf��<���u�{E`Ҙ1���� ��4c�B�*n�hw��YI�� Y��ƿ��^��<��Ҋ/�]�,/m"�ר1eq�>��b���Ev������ N[ꀵ\[��P�_/���4x�b����p�y�o�%D��6�q.��� ���� �ǀ��d*m:�HJ-�WK�}I+#{i�0����������rٶ���Y���J�TB6�]]\�N	8����
Txt9L���Y��ȗv��u�RO�W�Ç���2�֋�IcK�2�]#L����'lỖÐ�l��]"[�@�}T�c�o��A�����6�?7{�)��E�Ehh�K�a�ס��Q&��{Hx���P���hU�����T-��[t�Ȫ)� t=N�߰�N����m��`4�l݊�����ۊg5�+�~���_�V��Jݶ�B�Ҡ�b8�]��*��;N��������(����xU]O㉮�vi����qƛ��|��W���E���rF�ό[�L*}���Z�[��Ck�`�Cj�!�a���g�i6P�xa�f��Zw��� oB�M[�2]��^i��II%t
st��9�;�e���ښY�D���a�lbs:�|Y�����m�~L}ɛ�8�P�}ɡ���h=�����:�@N ��Q�}J��l�8+N���2��?��\�����Fb 9����$�nB�ۥJ�T�R���L�����3�C���Ϩ�uϸ�h�:���{Q��l�=�>����̿��^�s�p��yN�7(qf_��h��W�.�;�6Q���Y�]߮��2 �4���e;'k�s>Y.j������!p�Z��8O���^$�r�r�A���( U"^0� �G.���f���.@o��B����Q4׾��Πn*Mn�=��n�O7��^`�f��r0��F)���h��c���>x�,o��j�,��&Ѱ������g��1�$=�a���wU�C�8�4�lXvgu|����Ag������� #Ω���m�H ������?N��ј���.�!I�z����EVw8��$		����C|e��?�������E�ڸ�4�����ܬ��-�W%��,��Q�ѷ����nC�.�q���Min����9�gU�J�OʰPZJ�$�倽�)=$��~F���O�Mz�4��Xh�q�4s��ΠΨ�U��SnL�C�$�SH&ԞZ��fd#;I;�I��,�g�zkqp(����M�x�g<��^�SQ���nM�����%�L�Y�"8qˢu��j74F
�a�ȌN�[� 	�>�u�w�*����rFO�?���������5�7�P@;n�H�]qN���c���!���4��0Ğs{���I&͘/�O3���s�3�+�ك9��%�!�!4��6w��YzF��jjg˞	"��T���)�?��f{�2���4(����dw�2��"�k7Gt`�@�8�|B;�f��NGu����jY-��w&i�;/ʯ5R��掋|��g|_i����Ҡt�Z�F<͖qgkv�|;:E�ʬ$[�x�l��?�a����mw�=O��#���,�a>Yvs�ri�$���"?�FK��7Gi�ngx�����c�U��{ۥ�v:�5�48i<�zᮑ�i3I[2��@�5���&��T �  63 =�f�W"�]{ͤI�����"�&e>�k���-
tՁF��h|I�}V���������8���b#U��;|��ڦg�m���6@K]Ǽ{�?�b�V�,��Ҡb�"�\�1���mAp�6�H�7��у�}��g����BF6[��P���Th��o�Mu�K�'���;������%�u�i�	�{ �s����s��i��7�f��|saj�>.���yU�4~x@�*'A@խ��M'g��,�0_��(�X���JCx�*AU'3��rZ���=������TGj�侯IC�&
��g;�s�����[����%
:4m�wZ���R��*;���޺�<�Az���a+�.�����1�9J��"����#�b^;����n���Q�[�:�:Thj/\BhyvZ�-�c5�6�4h�!á}Y���]Er9�أ|���Uw.�@���*�>�{�kT�P��20������%N=A�W�4��جܚ�Xj��q\R��b�H�1�G�V�yr(Ƌ���kZ4�Gb�;vx6��gQ/�QU�^��i�6�����]�2��F�g�u ���44 ���� ���u@#�H�ye�vSv@#�� ���A�����?�;�� �l�(���4 �"zet;g8�� ȃ��2m�s@#�e{�uɁP�lwm�f�h��O������a�#��{��i[E?D���I{�y�=Y��Z(����mreLI����Y����:�?/ϷV@�f�ܭyI&jv�42�7ZT����E��!}�Z�u�g�<[4�![7�35Ti֬%�S�1M�����m��-�����y���}=h�^�}Q��3ڙ�����������<�^�;�ɓ_�NNN�p�]�      �   W   x�3�44�L,��LI����420��50�50��M�KLO�M�+�4�30@"@����@��L��B����������!���9mm�����  �)5      �   ;  x��X�n�6}���?C���-ѶlIԒ��,���b�-�������Q���(T�sf�̙a	��^�0�ȆGF�߿��~p�6����}��緿��d1e<�,���3�	I����� �#���x�ļ+*�c�J�Ix�Z��8X���kjO�V�jY+KzS�Bo�=Q#���Q�,��p��m"�f�j�Qb�K�cD��؞^����jEM�/�V푞�(	�<���&Ƀ$gl��mbx���y萜��\�d�E["\#Zq�d`��Ë��&7��_T!&g���ai����翝�t翽��e��mը����mQA:��ת�f��������?A�5F�:���Tk(уҲ:��赖m�F�k{���8FYγ�3��<�ݬ�1'!��Uu-5�α�t/�����h�_<]:��KIaN�P}B>UP�'h�H64i���\�62�Ĩ��	-i)��F2s.�%F�s0�gl���4���@�]mm�U��'�ɘ�{2x�\y��dTJ�8Ֆ}1Ԡ��=�f��I�V� �O��Ѫ8i�;�^���je9��`�$��Y��~�QpO��`�!�Y�z�"$t�������MP�gpb��>ы΋\�o���JtU���Ab[�Xw��5�[E-!t*h)��#�'hQW����]�DI��p��:��P���x@Y�� g|�x'$���ȼӅ���B�����(VBc�Y�/�e2�> 7]=�ԣFSU�@�C��w�6���ƀ"5�	a�܁�Ϫ-�~��S�>C �v��O�
�05tj�h�qL�}��O����~9���iE�SV�>�0Q*�P��iT�p���c�2=Ð��EScA="UR��I����;��nZ��Q���
�Bc���K�nc눲�Z���<]ߞŞv��Q(���湄�,�T��NW9tu,�Ͱ�	�>`JuZ�Ek2dL ��J�QB�������@�pn�� ��p���\L����8ÆE��,E���~`��G�)k��0P��}[��В@�a�I�[Ch�#�jFH!��(X=�ȡ�l���}F,4��]	�G�x2�=^4of�ظۘ��&�{8o����/�x��dZQ�n	d8����Pu8@A�L���nt	� ma��~-�>۹.E���L'�V7���G��{�u�A����vĪ1�bn�'y��8�y�zl�g�]��6��_or?�/����Ê�V���Fc���`��r9m���Ȧ��W'�*�mh��F����q��ň2��i�� ٝύ�]M`��`ߖpc��wO ����9��xy�p7��K_u3�`�@�����8U�y��]���a���a��\�)��̈́��݂�r���A�$M�Ϻr�~���߿�����*��6���Х�ڂ�))�P�ܭ���3��ư%c@fl�{�7����������l�`	�+���G��5��F芉��Yβ�3����L��]�q?lT��j�����=6<��A�y{�j둆�h�:�/c�w�gl��v���Q%�(      �   �  x��[Yo�F~n�
�ec�}��%1m]���g�s�ؓ`��oU7I��,�ɌG�K�����&g�i�~ް|�X��4I�ӟ��X�@�"��͍�#�&JO�!i���q=LhR�q��G��	��IH&F�)�; P����8��%F��R���n���q��G�Y�w�k6-�����ӽC!�N&ܐ4��%���PJ-���"���I�I��;���tKM��t�l���O� i���#�}�FI�!i�Y��`��L.R�9�,�E�t���/_���׿���~�AI�I;Q�5���4�OF�@^�u�E���H��$��*24�+���L����D�V�+�ુ��� ��8��I���H�wV��n >��~�������/��Ǉ��>���"�eƨ��He�i �䒛���-�"�>t���A��e�V��4I���Y_�k=6m`.��bX�&i�zSx�l��t"$I`xQ#X�!p�~}~n�ב�����Kj���H�7�,��뷋��廴Zʸ%�Y������Y���IZ�f��q���E��d�]Z�d�o���0F(�C)Ik��H���� �� p2A�8 ���L"ťƁ��T �6��:��.n��R��I$	�0�˫��,6����9��%M�|v�%J
�N�(?0��c[-��),P�`�U��e��p�	�$�V>�R]�*Q`�B��oFUL�I�m��I2�EU.=�֠&��sU��UZe��֠BuJ$�s�ڥ-SUh�AM�"r�:���4���:��B�U�%nb��)̹�HZS�B��Z�T�D@kP!��0\D���AZU�<��rm!((����֬� [/�U�P��惪g%,�2fR��Y)(���/�B5�Q=�FŅM�f��\�%����.�g�E�̖�>��6�bw�G�M�.ߗ����_7�X%��z�����5��^���6�e�]R���8�շ�P�	�����R��`P�8Z\![Fش~]_�#nq�Ą�@.u����g	�U��� uBu�T˪T���P���W�C7�� �.�K
�I� ,4������D�/S}�D��^F���4M�����|�e��1Z��c˔���w��aӱ�Icy'��I�5I�9(Obu��h\U O�f�2�/&�v�4S�a;QB�O�ȿ(�C�8n��tw<0�Ji�%����I�� ^�`۟~�����8]���-��U�'-+��CY�L������O��N��JA��Lg���+����w{J�eg��`4�v�W)��m����v���qr��uc��PX���4��a�S�y�-�����v|yi��k�rW����H+�϶�U��kAV�r+y���:���8q�&�����)�}�٘�`@�f�+�2�&4\���m3����p�)n1pb�۲���x�l�X�a{���!2I�g���C+���u�7�|�]���%�ʗ5��Xt��%_�O5hmQZ�Ɍ����A�]�߸?����}�z��vy�/6���B�6�$��Z7|�8K��\_�nڋ�~w��B�v���N:�e��b��pThp�a�z����l�S("/|b�Xu!0�D��I������=���oџ�*��b_N��+~��£�Vwl�V�eɮe�+,�zTl�~�ϋ�G��8��v��̊&��4fu�G���@��2�*��ck���rI4�@B��"����уf��Ʊd�vdZ|:-[D�EK�RH�j����	F~~p�����ϝ�J��5���-I�k��j��(���vV��IH1�ܸ;�IZ��F�]Ӆ�/�0l4;kYt�y�#\�s��D���Q�,֫�-��6�.p�땠��@�h��Т:�s#z`cdG:<Mq~M��~�y���J^:���j:��$��貐g�P�C{��?~���Kc�=Ǔ��i,�×�V�q�rX���k<;�؝ŧn���q��uB[����*��(@���I��}3�P�x��ZQTG�|��p�Ѥ*3��߸t�KW}߽&�k��̰-�c��"˞�]?��[ą�/0�dQ�F�-`ϳ���s�Pz��w7�)C���}���A�ۃ8{�{U��5�#c;Q͸h���B@��9�'����e��E��]����a���Nc��`c�ޔk_�4J-X��(׎�Dkǌ#3b�M�a�]g%+f����L ��*�X��/J��r΋"s�4s�S�F؟iq2n��3)I��	$R�:�����g[�z��bNҚ�x����!�-?��}6��,ۃ�E�|�������e8����\6]E��a0-� �^����I��HXpv�o���rכ�����W0r�H }Zb^l�����+�5�L�����a�&�]�I{
�%C�n������|�	K�-^��c��Ĵ��rS�T��PU��?e�b��$sb�ui�eЬ&l�n�;H(~�g�*5P�N��C���^v��0�T!
ܹ�L���šC����?Jk5���j�0�~���̱�����M����m�Á��
!Uڰヸv&&�L���n��ҷٺ\�s<�"�|H�E����!��H��5�!.�	�^^�9�%�]��KU�$<��ڧX�GȊ�!g&po�(� i�[�Y�=�l��{����n�0ȗ��c��]��ʱKT8��i���p<�:c��.���$���
+
(IҚ�"R�&
�
�[u�k�V%4�I���n�RE�"�ɑÛ*��E�ʁ1!��)��5���?F@(6y��5X���9�5�|ZObS�r
h�<�C����aS�g�A����bTȈ8���(�''F�$�oY�A��S�b�lE�|�
���ś{:%i��K�܈��)�Cw�����x.�\��'ri�]�?��z�F��@v���ZJ�;-��)+Wog�QB�i$Ìp�N�ݮ�}���g�k�IObKҚ�8���1+��b�n�~w�C)�6+��}���0�8��#���ϰ���!�XW3���g���{>���a��u�#���b.6�c��y�"
������e
�đ����NW�w$�Avv�v�?W\�\��JC��Ĕn�G�w�kWÕ�Sa�>i�ؓ���"NҚj��ؾۚ~��*�~.���׸�ȣ7�TPm�hOm�%���p�ƕ`T��oʲh��'���BA�5֦�6E=�5m>����sO#яAw�]�^��	
,!3��n��p�g�d��:�-+���v����[_�000�{��/���7�k��2�P�$i_fUHk	���Y���KNa14�r�LrSx��i�����6������`֯��[m�	�╇�v�췖g�w���"�7��sL����1���t���s�O��Ӄr�E^�C)��I�w|C��4A~}]�;Q��}�e��4E�-
l�6+�����t\�s��|A~Ο B�8�T�wx����~�E�j9w?��_[�TZ=�^��5Evġ�|�+�]v��}�5,\(212��d�?�l�i�k��B3`� �f������OQ���������������h}�x������olw8♬�+ݱ����!Y@k:2#X*�ZazWvT��@Y8�\d�[*gC�����J�`R)q#!����q�8kU��|����m�����5��[Z~Լ �BEz�/M|ha(��R4�O�q�~ 锨J���{[{����f�Z�z�"iUL/O�*֐�Q*��>�m�-xp[�g�iu�0����|��/�m5�h6��:y[b�������	�*p�7(Z}3����5ບX�-���k����մ\��p���W��8���5�;bbq���M�b��&&.�\��gYZoc"�_nB�zZ���^O�9S@k��m����D*�5��6~��
���p��_硐;t ��]!�`�'<�v��FD����݀�IhMI�܄�R�fn�����L���h�����h4�?���e          �   x���A� E��)�@� biwc��H�I��6.�y�����Y�(����6*gm��nWX�]f�S+2�����i�\�2�R$�7�e�%�T���`��+��mZcz}_��/4jݡ딖ʍG��lJ!�M�0�         G  x�}�1o�0�g�+N�ԍ�> :���JU��Y��$�S�Dʿ�H�)�dY'�ݽ��KV9b�1��+�׮l���BU�J�S���Fm"��c%Ȧ1����}���֟�&�{�2!����C�K���eOX�S�ۉX�ZU����ק9�%�4Ox��lK�b��@�4yv)�Su�%[]�F�1Dt<�ؗ���E��ƨ߃j-\�p.�kW��<t���
��"���ǒ �GgW��^��;eZ��1����M�hy^��7,���U��[�>�4�~D��d9H�Q�����Z�d�񑌻<��V<��~��>ޖ׋ � =���           x��ْ�8���S��h�%_&�$=2�,	����Wl�@��ӏD��K�$���Lq��-�ӏ�tB �M����6YܹA& C��jc�:�)2m�l� >�X�s�؊�8���Ȁ����Of�������_��>Mī[8M��;���7��^һ��x���]-R���c�[+�A2�tG�l'�&N�F-[� H7��{ǺiҼA���A��y��w�S���a6dG������%̺�V�@.58�x�32��)�m�p�*6 �nP��9>�@���g�~����6;5C���Dl�l�5_�Z�Ld�yEd�qw��h��~��qg1r߈�^�/;޷�"��-n�Y�����ߦ�mF��|�8����� ??�
��N����t2�v��[��{r3���ܽC��Y���n	0߯ꭟ��3}^{Q�B-��F*UV"�ky�����?|�ͅ�ǣ��p�0������Ӣ� D�N�E��d1 ��s�#i�t� jh�F�-���t��6��0��]R���8��4A�ԏ��#�<�4NBC�t��1O�s�RR?�B66:VSKX�c�f�V3X.׵k���cڔ0G���:FԂA������(�aq[�*���e��Ejd��gɒ��Y{��":���2kdY��s��,��îߟԦ��t��2���)�v�TZ��=�%�2W4Õ�.Rܯ����H|�3v��p��2ʹLkU�-u�BL�R��%���q�p�$�*x���w%�*�M�Lb����Hցt=(�,4�2��5�<��Mj�}_��)�frU:Cf�\���%�Й�g�궣R���0ɳg��\nCyZ�G���:�6�e�p���b�0C��!U)��9��ҌB[��b�R�@Ǒ4�	${aD�F�1JU���U��|���"���ko�� �&7 �))�e�Y'L|o��$]�����Ń5� 2�x��r����Фt�؝��SU��C�����#kCRq3�at�s߈�x>x�Mn���	{}'�$���qMoi���Q\m��F������V�?f^ih         U   x�3�t+��Q��M�4�2�H,*��9���KsJ�J�\΀���Ē��< ϔ�%13�R!<1�֌�#��(��Ӏ+F��� Wr&         F  x��Qo�6���_q�C��-R�+���k���%-
ʤ%�2%�TS���(Y��:]��dA>�H�x<~���(�3�f�s-�����o���C�E	(ةWY� ��zaH�]��7u%垑we�R:�ei���MYHk����G&��������(M&K_�'���34�.��L����ً)��yQ��fm�	�N��+��xf�\K���LKћ���)��u�~鵉P����Bvѧ|��LYk�L���	t�����l�Dg��,ao.r���%�M"&Ք���o����S	�pm��)�'��f�R��:�Q�yo�BHtt΅Q+�5�2�J����z�z[6�,���1e?���z/�ګ�"O`�57�9�9_���	��1�}.�����������;��������s|�����\�4�JӔ��KS��*�I(�`�B��y�R.�B��<�
�c}r!�S��,pe���������-�QK�����C%���Q�!�f�$�y��6z��r�뵚N�Nxa�J鷢-�~Sw��"�ٴ@�$$QL(���G��'���Z��>}Y�����⊉U<��x�q���⯿����}���X�f�.J�q{5��Bm���=�����;�l�M����=A�a��8]wG�<�r����s`γ3g��QB��	�ؽ�	c1rnj�1������c|��X=��і��=���)�?���OG��h8��аݴ@O��0���q~����a�'i\H���ޱa��UF#��}h`��%õ4��$izh�ńi��<�p��������������7_���      
   �   x���M
�0FדS�a2�Xs�ܺ	Xk��R^�f�'�EA�G2��q\�����ؕ��|���hPJzG�(X�([~�v��~)�R�%�wSp��m��a��a"�r��SͤTX�~����%��[2~N1�B�\W�^?ˤ�6U����N����(�>�dU�         6   x�3���/�4�2�t�Ɯ�چ@�HiS m�̀�	�6Ҧ@:F��� 4�	O         �  x�͗M�� ����@:���,f;�����18�� A�{j�\FU��W�x<H+���\`��
�2QiAk���Z��'����ۚ.:���q	M~��k�~��������?:�>t�2��=�g�W��L<�PP��t���Eʿ47$S����{�� �M� (7�e$����*��ȯYt���� ���>2��չ�� �)���K#U��{$ Y�  ���?�"J�F9*]��s��
s���>5� Gu�G~�IR�h�i	�+-�A�d�u��K/���.�! c���R��)�fZ��Z2��.c�1��d���ځ�������D�J���ʆ���&b�l��P,�^�:����� d��zb)i&��A�)���Sˬ�v�$�kfL1�0O�ɳ��8I� �Z��U���3����nΔ�ϴ���~2L��
��m����0�q��Il\��h��-!+S/Ier�R���j���!�2��K���Nn��	�~f-��{=&�E�(a/��ɱ2�LN�LPz��W�+S�Re�E��D�N)Y��Y��R�E�9x����u��ٴ��ڋ6��RS�C�R���k��5��43���r���t�	_b�����͓���.����	t��	�y��z�;�,1�<^wẋ�$�I���I�f.������E�_�w���s-
[i�l09a���YOs���gL5K_���J�T��I�B�H��j���a�KQ�@�j��������         9   x�3��5�4��".#N_#8ǘ�!c�銐1�t5�s�8]M�sNWS8'F��� M�O           x���ۍ�0E��*��C��-`�����7=�	<}pI^��SE�G��+���)}�~��׹��b��/�>���;h��I�����
��;�xR"��m��<b	��F���,O�@l�$}=��
�k�ɲ�Ĝ@�5�֜�n�-�Ac�iU����o�{��G����W%�t��PI�N�[��B������3��"�E�s5o9;4��I���`�i+�I�N��$5���J���&c�Tm�:A��ć�0�u6��;��p�|��V&�C�QX�U39.�7V�n���G������ E�@`e(g#�R��0�zpZ�������zi�9������V�GQ���ō��y�z��&x���*����3��K��^�7��=U���/sVj�hK�vYxs겜��ˁkUb���hT�+��`�5]��6C�]|t��e^�o���T]��0������;KfHqt�T�,�b�6�U�x��>;�Ƽ���+��L ����`s�2�a�d���l4�?� �/q�E�         R  x�5���$1C��`���2�ǱS�_2�@t\�s��ppw��G�H��ʮc|�����|^�)V�,�¾
W�*�&6�=�^UI��Ji8����@h�%[��k�^p�k�g��Ȟ��{whB�X|q^_Y��t�,�H�m7�!�r9dE��*:M{(�aC���Bd%Ton�E��B�b��n�ZT!�8���Fk�Zw!q����Q?���>�6z5/���;�XQL)��C�.����T��L�OK�Pf�h�;�i�O��6��� L�s�B�1*�m�<�n�Vű�?��G����^�_q�~+�4������	�c�������N<�?            x������ � �         ,  x��W[o�0~6����8�<nk�V�Z�U�K_B�$��f!�u�~��@�ԋ���w9ǟ���!.IHYɆ0r=�3���ٕhם���\����|N�1�<ܒr!�
a|�v�;���)�����Xx�p4<!.�W�]���]n�W�0� �\-W,�j��O던��~,�]�Q���j���b�	���1Q���r��?��>B=]|QY)ˬ���׊gK
/"�^��#�-�����J3��0ЦbDh���@1�\��`Oi�E��x�(��U�{^�U���&��zJ�і��-TK��?c`+dș���EN朖���mU���[��GX��(���k�������Z��W-��ZH ��ƈ���D�*�XV����s�ϜRu�u�#��@��YU1��=??��t4�s�W�����3#]�����������2��X�������D0�G�e�"İ�� 9ȯ܇х�ی�(A��t���Uπ,���ӎ��:�\��i��,�u�|x����7��4�!�7�C���E��q�l���p sq������'XȢ��<٤0Nt��!�O��iF��!�{I��!^＞�s�)�]�vB�ـN$.�����lߴ���Cm���C���7�𺅳�Im�G 0�]��V�u�1�DH|ow�f"B�61J7&�?���Z��P<�i��0́�}�[{�a=�0bi���˔�R)�Mۤ�nE]�.]���X�K-s<T�vgi��)D*~����#��H�������r��ώ/�c��|2��:�ŏ         H  x��Qo�8ǟç��j{*;q )�D���'-���N+��C|��f�ܧ�IB
݆��I˓#p�'�v2�_f��x��-�j��,v>�4�����v�G�ō:ԥ�Mh���*m���������:�u��&���<��x�Q�湂m�Q0�h�	�;�@�y�lS��Y��*��~pϡx�]`�̴��[D@���Ż!��(M����� ���%fL&�J���h��D�t�Q���Ѽ�A,��OSQ�~�g˅�7Y�>Xe���g?0�<��N�;�;�Jh<����D���D�Cځ{�-���
0�gz.�1�D���Ϧz}�Q�
>�i,p���\r��𼮕�B���x��}i�s�K�3B���%��竢��%\�+^Z�a�W���&�Mۛ߯�����Q�A���`]�_�N8~�s�ⱀ'i�q�)WK�- �[�A��J/����A���kSTo����	�s������8�F�Oa�"Z�o���6|(�_Í��-�e���B��,�)U��������S�y1
��z8蚸(T�)ݪ�\�[��'Dy�E�E_���-���I�8N%�{��H'�j���Ϣ�����T(�ADz�B6B\N��~�s��V��?B�^�Ja�,<ؕM}��iP[,,,NI�^D��{�/�<�t3[�ס��_%	7F�WI�$^cpP7�8 U@P�hh���!���pw�)�[)P0R��eb�$;P��}�3�����@�hi*y�ZXX�T�4[�$��[?9�;��w$ ��a�s�����T�Z�[�[��&A"�G�x�=��z����M�~���������,���o�C��d�>�?+X8X8�28(�@#7�X����3��p������(���]�����9N�caBmAYXX���j��#?��:M���� �%�WC�gM�C֌���R�R�R�t��<��E���A��5P�O�\�l����{�91� p/���¡�c�:A��Ђ���D �2p�A8���V+�Q8�$]d�� m��W�V�V�V�'V��F��;�V��50t         *  x���Mn�0���s'�In�}�݌
R�"!Թ~���ϰ@jzO
��L@�c??�Sƅ�j%&~Ar)`���;�rG((�uj����X� �T4L�K��<�`��e�V/A`	�\�u�c�#�ݧV�(�v�8�/W��Yea	�ʠ�R�=�2�:c�捥6Z�8�����Ms��������8���`��3v��p8�S�+Q�趖+����G4�=���)k*���L{(��b��TF���}?<�a`��<�uB�S0������iԏ���_�E�G         �  x�u��n�0���)����q�����v	�*�B�Җ�{����06=��-����ޜ�����*��;=/)`
oM��*���AK��"e��Ĳ~��il�A�_6�$f�$�LW61��R��Y�K(,�w��$�
��Z>��`�=�>�0P{!-񻴩�D�E�m�*CJ�B.���W㑑��(8���LH���ڽ6q�����X�OV[���L`���pj&�+����n#N���&a���x�Ƽ�jjL��l}��`I�f�X�X0p'R�D=�d.�_�`�,�D�F�eeW����$�m�(чT^�v��X$��y�uƖ
�#wV�3H}��8���!�s}�O,��i 8|�:��Í����'����ѭ��]���e#          Y  x����N�0Eד��h*�IhîV ���n��mL;$NϤoUEBB�d{�sϝ� 0y��WX8�c�ʲ�:�^;��R�@�@0�C.B�vG�8d)D�E�߭N�Cx�@�'0y���q�ո�_�Z�W�W��)�4[O8sdE�(���(U��W$N�� ����w�k�c�j/gFa&m�sIh\��bI��)V��R�'H�;ŷ֣��3��]ۥ��^���Jl�YQ�4��H�y:�D\$�<�7M��Q�Z)�*U�Z��G�d�1�Ϻ��e�����x��ٺ�Q9�An坭QU��8.��x����l^k�s�o��ofo�8��O�A� �̭J      "   �   x�M���0D���T��^�t�9z��Y�y��À�5'M��R�E�I�3y�MZ|a0F����c�~r����vpe�<���y���C�8��0�y�YC2��/�&�������C��R�LiK|����Uz��]�U�p�.<�ga�u��QyIJ�-.z8�Y���waK�bx�G�K����΂+��\��M�BT��Wk��yJ�      $      x������ � �      &      x�3�4�44�4�4�����        (   �   x�]�1�0E��S�(
���],���*R*q{������A�gai�$���{IOQs�2Gx0�q��qȯ�ri1퐆��hC�øT�B�Wb}�ض� �1-B��`�6�����]��p�ʦFU�k�_��r7N      *      x���I�,������Uh� ���y`�co���/��!��ԽOz�H�>"� �6����?�����������?�s���@�1��s��W�/���o��;����/�7���H�L�_B%o�ݷ
�۳�6,ﲽ[�����s=q�+q�_p��	����q=�-�{����'���n�;��n���rK���r���үC�r!n�nF�+7#}q��p�/ܢ����B�a����o����3���|>��[�P#����P�Hb���a�4w���ڞ�<���a{�@���6C�}�f����s���pQ�<\���'b면����ړ�.M�kK�ﳀ)\�)o��E�O�ۑ�÷��	�6����ck����ic�G�����3�igZo��;�
����&�[��Nറ4�'�{�,�-����}�NyO%����i�a�ۋv_|l�Ţ}q��ǉK�D�j�]w�e.D�4��NJ$���z���ϭb���l�T�
�1 ��P����Ё��º���Q���w���[�t�j�9�T�93����Fm�O�F���O[ΥbH�R����a�o)��8~c�m�e���u�|�P6�_��E+�
�ڰ33�3G�	6s��������1��`:s��i���
֭4��=ײ=+m�|�t�<��p:S����g
|��<j�6���=4�`�F�C[���N��U���5]y.�0H���M���+Rgඕ'��W�����CկBG8�)��~��jG���v��Y[{�V�>#�^�ȴ�&?�i22_�L���j����zl���v��g>iQ�Ba�6֒Ti��~���ۍ��;����х@�E��ې�����/���/���ݟ>��}"Z��/$��Z����}�#��4��p-t�1��1��`��|l=�����9�����lA>!҇��4�Dq���*q�aå^���4n:�I��=�,t)��3f8BJ?{N��3,{.}��l��M���[����_��d�R�J�y�3"}�w��r+9��!i�)��1�y���Mz��n����	�3����x����+-S�EW�ȫ��h�t���}�g�s�����j���+�����0�(�Y���AW��&�Y������s�Z�r1����0�� �`�s���B���NFz!t���tcܟ����kp[��̥s�_T��p��L��I��x"o���Dϰ�p�Tf���T�wR�*�m#u�T�;	��N=|YI�t ��Oi��5���^(�Șc\�$���C�N���s�H*���5t �C�L�,ಱdx>�C�7B�b�� ��W@��]��X�	 �^�?�?�靿o�H�����/��.�?BR0�Os����|��e�e5>�}ΰ�H��FgW�}��=o;�t�^&r��C{�xz���n�N�ǋ�;�� y���J�X��z�穠��<��ZUi��-�'G8�%�'G}��w>g��zU:vYC��	6����N`~s���:F�p>��r"�u{�	����N ����-��0]UE���*�6��E����h���Q>�D;?!�X��4M�����q�*�=�E�De�G���m�_R�������s���|W�]�뿴����6~M'mJ��t�d�p�5I�]�&?/��.?/��џ�6)t|�|�q�T�غI��X���iPX��S�yRHW������O�q�9�z��uR،էݨf����|�����F���=��F��i����|�Ϛ梟UO柡��ϴ��n}�}���Qg0�:�f��~q����;����"�{��i�/0��,p��>>O��׍�ʯY0ɡ�u(?ok��:}[��,d�*�o�H`RO��+<)��`�dH38��d�n�K��V0?�������p%e7� �W͹���'�l���Ňt_����HoHz�����H�8�lWę�vEY�
׾�Te�ZB�ǣ8FY�Gq���~�~t{��6���x�̆���$�s'���7�`��a�/���0s�����V�I�E��v��S]T�V��K�3WvQk���K��<;���]�v��e;o�>�|X��w�2��æ�{��e��rK�~����'y��~��/��Wi������ � �����C\<,�҆�����@��𺓂��_�A�t�.S���-B�����-���"xz�_[���J|��BWibu���@&s/��}��$6��k�Eo��o�pg� �VVA���}8`H�������7�V��=�X�4b���飢�{~C7��w�Q�ܞ����\�qg_��RDq�'�)I����P�xĤbB�G\�,��<b�7l��˘���#δ����	�GLW�a�I.4:�e�|�D�,���O�/�Jϋ~��h���!F���$����w��'~��v�^����!?�8N�D��6	]l�'����H������2��$�;�̖;qr��G}m��^��|�6kVW"��;����t��!�G#��Ud�i�+�<�tv�ƞȢ'��H,����|֭�@�w{��ﺃ��JZ�H�V�(�����u1���(�z�G���ߧ<iJ����Qz�;.r���\���-$�5��+3����b�a:����JҔ�A;�Ѕ�z�w2�|�dB���J��ߏ����I����6齃S�1-�T�Rg���gp�l�qu´�"�3��_����cS����-�>�c�T�[�˷��v��L�#��[��@�c��˔٨,V���9��=�$�a�~���K@�KR��Ɠ3�*�!ތm��@'�=�>����֡w[���~����6e��!��M9���Ɏ�.��h9��ц��m���L��tX������9��y˲uO>��r�z�7:a��������r+��X��g#�9��?�S����傦��˛n�N�'��6BX�r�%{{��l4H�l4~��l|rJ�QH��^�]�w�|5��1��j*Y�,����R�t^ѿ�_?y �����;[I�1{�WҞ�h�E�gT�=Y~�ʁ#�"�t��q��$5����P�B������[�9�t"��M���-�{�n�ۣ����U��)l2��p1������@o\	��ѕ�gY�Ï�7*��:�qG܂t�H�V4]�h�}��+���59����ǵ3h,t�<�m���݋�̾�e� �_%���;=K���u����Cx�N���#Ąfҕ�3_��	K^��T8�j�x2m��$a�"�'��~�������?`'ͣ�}�N�J�Ej�\�A?cn��GOb������y�|����k�ڋN���Co�[�7��k�|�]����G���l\�����;I��N�F�ۀ4��|��l軕=t�Nd��I|P���3FVu_�k�o������r"�-����h��&�0��eW��U7Hl���n����22~�ڎ8yhO
�;�8���`%�_۽k�"��i�XO��s0��m"�]4�#>^iж%*iM=�+�vz��������y{�#�NO��c<M�W��Mī������ށ7} �)��S���yvX�	3��n���ƏA�W�e�l�nM�l���[��a0������蓫v[���&�}hb���#��5>�j��I�O!�~O'T��2-�%s����zӾq�G��\����<��b�� ���|�9���'z�t���ɂq��r9��=n�'M�yv�(ٜ-��;�
į�N���V���h�.�N�YuП��.:eZ��r�AW_8s�U:��C�+�6�'[y��z��ޙ��ǣm��� h���k 4���:��Y>��n��	���S���(�%�b���vļR��RP'u����*GS�����N��F-�^;g^�8�ONߟ�n�;=�҃��}{?��XZ��Xv4+W3��������fE��ٕ ����� u!?�k��LO���8o�����C���c�j��~LU��K�A����J�wz҆JX��^���8d����C��XC���.���"�s�#�A�i!�Ǵ�м��ve���k��X�����O��%��Ǐ�_    �!4����C �u�>��麉�kIe$��V�=�J6�AӐqB�ub�T��/������52� t��� g�X�9K���'��;�G#t�uB�	�53��烮��^�bgT�1h���.h���n�WȘ�:h�����/�<�&��'�%2dhy!Þ�!��6ًc\��?ImM-o��)!c{���"��۬����^�;8퀔�G|m�#�k|.��p�J�����#�c�I�~?�{{߱�!�~�,�m2�^=���+�W���.��:�x���#X�
�~��#�3�>���h�2���?�6Z�	I�͍^*�}���3Z�pu�sݳ�+��>�IOD�<E0� ������S����#�����FO�\HV)�A��L\Ɯ�D�c�hZ�D�9����'s�>��?nt�����X���?nE[o�bi�A��C����l~?>�\�,����NǇ`W���������5C���%�T����dI$����_������dy�ߣY����''�!̟��V������c=�5Y-|�+��\�i�t��\|�+^ W���lA��}�,����k�s�٪���Cn��
iw<dC�g��!x��e��^o���w����,��R�Ӏv�X�a	�8�Q� ��S$u����;��<�q!�!��SBboi�כM@����V��>М��f�Qɣ����dp3��`I�� ��c ����Z�1+�����%B�{z!d����A���3�l�)���|�ӑ*7V�R��kT!���T$95k�DO���B^�f� ��/����^�L�/�j�F��C�'�C�(�e����褼7S5��(� �ĳ�~
�5�[P�+�l�oi�f���J���=;A������?�J��3�IW�\mA�6%x�9=`�t ��_��u�0"#�tTN�<k��v<�5jhǼeBrE���1��Q��L;J�l'��dQBI��24��L
Z���|$s�^�Ƭ�:y�ٵ|E�x�]Ԫ�����/��cЮ� �y{�j��z����*	�'L`��Ih$�J���S�+���\/��	H��p'|~p�F'a��z�0Es`B��~�ۦ�I��.'�{��������F��9�]&~'zg�[��9`
0�K|8⻄�A>��6(,��I��� _��4`K��/�X����đq��8I���eg��������և�.���}�"%`)��bG}�J�Pm&��"RI��T�\E�I�U�>rS�'.)xz��k��������s�|{a�S��c_�������ٹ���A\{r���\%T���`�Ф���9�Y�z[���A�����2L&����f�OD�c0�P�=p�������{��)/����5�Y���K�A�f�r��I�q�o�/������6��7V�8^}c��R�
�9�0������.�-�c8���V����|�C4��Al�?h��JI9(�G��'�"O�G�wW}�ǳ�[�8"�(CG����ea;�zs�:�!ݷ�z<7z��I��<�$C���~E�ɖ��dg9�J1�5�NV�=?�dEs(EX�u�H��a�_�����[���7tP�ɦsL-�U���1���٬J�{�}%�C*M���o�:��֩�Vҁ=�3=��:w��W�9lAs1��7r�1��\��Hvzu��/삈��W$�K�Ǌ��Q
��;��_�&��㰆S��J.���Z��e��1m�W\��t�D���������:zy�Y��ykڽ��A�Gi/��>ӛ�ܒ�W-j��	��$5�2��-�ױ���O�b�1���Hy��rM���H�7����N��[��<6��5�Vx���ҽ^y���}����{4��"��6�UD��!̈4bR��J˥|/VI|oM��T�Kq_�2*�%3>7�LX�g��I���s��<O����_tQ���H����ٱ�SC��X�+�9� R�?uf��0�^Y���յ-?�{��	��y��T1r�d�<�3�j�蟮�kh��\��ly�H�!�����w~�cٞ/��kz?i!_;�sX�<\x���ɰ���k�<�3�l�n��
��
%�<���X�����Awl�B���:��/'ewl�E*c����6��ݱ�!��!Y�tw3$�-�S6M	�E����B�䚅@Co��J=�;D��QT��>)|�^���7�4�����+m�N��x<wr�_��塒��!Mb���߬���Foʚ4X�H����c�V�,똝'g%��s����ul��G	bX		tw���0h�a%p����̥PR�	R
Eb	Spe8s�PJ3�l�b�R����׈������O�)�v#�fN+��i+�J6J�>��B���l�����9�U�<g����-��S�]	i�'�\IEVb ��ԙ>Uz�W�� ��9���7W��a�1
�*�{�m��u����e^L���<}��c��q��㾽�\�)�{�ȇ2T;��P%/W�K�����TDN��,���I%�!�U3%wZ�>���ǧ��M��$��!��yp���)���h-�t�׻��}{��qk���賟tܐ����М�g�8�Ƌ8%w�6�g�N	q��l���ڤ�O^	Ѽ��r	@/�2@��"'�SY;�@���$e��pߚ�?^�A7�L�q��S���D>���}��T��
��9�C��S����l${ԧO��W��7�H����O�T0�9�3٪�Oi���e�)�\T�L��)>8��&ԛW��	�=%)����lD>�4VM�K�oN�s:��ti�a�,��+'̄(�'&��5X }r�䖸<ڛ}0/��ٮ��K¼p�*U�&���������~����2�l�.}B�W�&5����
��$?F/e��D3�H�����?dgN�(:�Dg��Ō��~���~a�{�� ���H���u%D���V?�D�+���Y�b��^I9���U>Y���{��k�i*��$�9&���͑����>�5?��ة��ʤ�(��u��Sʄ�`J����K���S2b.�[z�9���r	�5���&�Q���X�x�5���QK'Պ�'��%4��-�(���5�9���a���c���?��]M��'��5t��]��w\��/f�4���H�D��N�?�~8�3�?�>'��\�;ף�%J��rЦ&�Y�	�VZ�O��OWK���e�1[�y��[is�itV�A�7N;���K.�[���Ur*�8���͙��f8��/���XلNv�?�]���˰Ѻ�?�]���4l�����6'hN/8�����X�6	�i�����v�&�?��
t$�?#8Z f	�a��	�YhWL_6��ش:#�҈HM�LzB���IC��ʇp��Ӈ�qWr.�I)�>$�;��a�|�B�qB'�\F���0��p�*�z[�ֶ�Ҩ�����6�(���pO�Hݕ�ol �,h
rw/�oh:{�4l�N��D��E�i���clss>�J��g�^7��{'�����N��{��&�~6�Q$�N>��owq$�K%�N&`ʸ�(
�� j8�?��j���ʞ(��r�1hòz��/���h>�r���!�]��A�<Jw5$\>D:�JlGv}0� �H�`Ğ�]��� ���`�R��"]��D(>�`v��=S�pq�
��*����z�E�j�\&k��q�#�k$�c���8���;4{��E��$ւ��f/_�H����`O@���]�^��h_VB��9���T��1@�ŀ��B8d�����q�jD�󣬈�6�pa��Qh|�l�O5�}qe5�!��f3tA\�IT�	�$J��u�+]����L�LV�lGA����J�kB<3��5r�?N�<"����#3��iXa��&�/�0������1�V��9�:1#
L�	�����q��0���k�珼�rr�9_���X?[�Bv5�	��Ψ$_�.�<U.e�&_�����ʰ�d�_'B�� K���� �������(�MBz��-Z6D��Q��aa@�TÅa��ɐN�z    �����[7�t9Q��pe�7y�4N���cD��n+��擯�h���0F�����hM8?�����=n]i���-�q�}r�����yc�=�����n�1�SC��44��U8<�������9��[d������v嶵{�m��T�8���� &R�8uF�h�N-M�|�01�d�Q��2��բ�\C_�� PG�� �v��/˂��h0T�Зe��^��k�_�������$,X'��DMq�����.��n�P�Һ.�+�Z�������=��8p�
G�֡�v���Q&�C��A�f�˟����M
ߣ��[�on��i;�"��ˤ�+��.兩I��?�	�:8_fG)��0F-���r�(�A��f���l��8�cd��/�\Ξv�<I&W{R�UFp�OXh����+#q��<�$U�e���F�ܧ����,�����ٞ0"����Dc�3�}��)? j���a2WW�帾>�E4������?Q��+2ǭ���烓�-�����r�r����i���m�E�?չ�/�̉<�&E��|��������hY���/�ʩ+��K��p㜢'=U��sr�~�+ȕ�B9�-F���ʁl�UȽu�1:5J��Qӆ�&<;����E����=f����uh�?����Q��YV�B�
����A��������:�~g@�̥�l:˕a�.�O�H�^��cV^PO�<Li�SNo�f���x�91?6����Z��?��/���Z�i�@���4�Nv��ޠ[+/R�����ρN@�:��T��ћ�oh����挱hO���Bq�P�a�����M\��c���3���:���|��s�q:ݹ5
�������y�G���� ���-���9MO�f%֓>�\Z�h#w�x���s�Y�.dc��x���i̜�cv���">P鮂�Ï����erP_G�:�> ���jV���_M\xiu�%a�z73�V������׻����)(e��_����+������V1!�c���kԄ��*D@i% ���u��"ɱCJ�����%\`�
i�@�{O�n���e���y,������һ%CK���!�6�S��[���������n�6'ɍ=!�8��ۋ�D��M��e%p�pٓ�S�����!:�Ƞ5����qy�0�]�bPD���!M���8L'�`�ȑ8I��c�c��IuS��J˧
WG��V2�eC�O��%r�m���*�?�F��mz,*��c���Nq]�dɟ\��癞�u�g���B��w")�'1��#���A^���$��\)i2K�Cj���FF����������>ͤ�o���A5�`��N�ʛM�9��i�<$C�Th,`̷'����\j�>Lϝk}@��s���?���F�}�!�^�.�Mi�Q�n��/�?�n�j_��: r<�?�"u9�щ��F�w�A�jY�@��H��m��Ql	W���2I
�ut�&�hr�o�<�h>���_&�-d<��t"^�er\{�Ͷ�ކ��Jf��W���㊔ל�y9��/�2��cZ���y.^�e
�$��Pq����D�}��/�2�UbL�0���:�+�9=P�-D/�2�
��?� ���+"�)��0�$�"��hKe<���mɈ崉��r�}�����MҏdY񊀶�r=!�6Be΅��=�%�[t�d���$rT���&3:���j�M�>u6|3$#�l�TFV3$���챇�˖gۇm�5���Ni��'Ϛ��;��G�aH�� ��gץ=#�1�WD����4���z,�� �~�4i@'�0"�)� TQ+WD�}5���M��\�Φ��0����5G�0�w��#~',�D�^�a�8&��Ogsq&�Ia ��@���<�1-�b$�O�p��3��0���K�%��0���^8F�5��0���.�$���6E�n��y���r��a�p�C�x^�dʢ��<#0�����=�$eD���0����X|W#!ҜK �d�X�?�\p��E2���*���4��R��l����1$+h�^�G%�/c�1��t��GE.�nm��>i����9 ���ŉ����>�R�u����פּ|�^�ͅ�^|��z*6ah+6������t��:�����*9^B�<HA�O�a e3ۯ�Kl~�G�\�
�\�U�pTp!��[\7]�5l3Aj��[�ԗ�X1�g�n�N�[y��B�	�T��� \�O})=�_�n�����V��>�$.ĝ9~��U����)�d��DO�C˗K��ݚp2��B�FV�0�����r	\I`Vp5݃O�?sa�uģ0;�����	�����%0��:��!~�Fy	�u�V������S��$�\9�;/s���A�PJ����I]^G�M].�/v^8��2�K����y�W�ZJ�����/#�c���2�M^�M/�>4Z��)�Fl��
ia<bdk�F���O-*/��y�
��*���9�t�*�%��ΣG��B�*�/vr���5��x�,�ل�����^���՞���۽�s���D�'wc-q�����d�tl^q$�ʿ ժ�U�-n�&p�C��d�-Q���������nh�V�u~\5Ok���W�ˑ���}K�`��^�Z��\y&p��>.
x�б#�AR=��e�u�r�f(�em�Emv��C��y��5�!�>_��Li!�R�	I�}Y��������`�=�Ң����;��{,rEZm&H�,y4���������]�~a���u (3�1@FX� �_�ƒ���*���H���i]a!�e8��Q��վ�Ea��E��H�I+!���+c�鉢{��T��1��`椒.�$G{�u�\y%5oqo�+�|ŭ����2� �Q�j�L��a+a�+̾@�a��d���ֵ�Nث�08�FV�������<���1��e���\p9��^�d�gD��_%�����?�~�����	�[�NHj�+ܱ�� ��<����p����3�N����+�����٬1�B@kMRp2SF��f�����:�1,G��S�������c�y�X[M�K�����}j�z������&��9r����V�̭�y[�7q[���&E����0����wUI!{v� tO����Q})�BFm %�Ӿ�������HX�{mKf�:��L=XX-��h�qfe4S�K�6#z8
���S��"�Ҧ���Ji�%��͈����V������裸`���Xl]	Xlk���$�V��J��twA8�9�yM��(�5��JY�֍[	�_���,�)5�Tד������>Q/H&!&C����nj�0zاuq_���P�z"$�l��R
!��W$͞.�U)��8o�1���ڮ*��j�J�@�����2��׶�*�G�>�yڇX��i�<��E%�d2���]�Iz��V�kJp�9L(��EC�J�"�PI�VB5�P�"���ig�>�Wd��"��`EKs��%�om�(�����̈́��H7��~A&!���$;M��.p�>RE�z������ YqG���uE��(",��(R�l�[�l��-����������Pn�뙠6�t	\�i��h��®5�;����;F%����3r�gF֘��/�)���*V�����W����ȧ.��	�yE�r�+?��Q��p��,��EW�3q91���J+��'锼0h�@����(�}�z�ٗ>���+!��p�L�yG	f���5	��Z�����?Ë��X�[f�|sP�;
���L�@u�u2!��_�K(��/��ȍC֯�Cjt͖�|�;D
�I�Ju3���W�l&ѿ	�ɚ2,4�#�v����WH�'�W|p�����{I���g�Z�d��*���h��qQy�۶���I��燀T��0&ȵgV-�'�(�z����*j[Z	`���{~��T��V�(������'�����Yw�ǭ?씼����ͤ�Bc?ȁܸ�"?��H�T�����M>7M���    �
���Ș�u����e�§ԢA���ޞ������=�<˘�^t�@�k�|,ce��
����]��@Э)2(�5]u��9U<��o��ǭ���{!�{�3�1�4�7�q���=P�ڱ28H�&�+Hn]B���gB��$3I�s3�vd]	u�!�:��BȒV���N�]	� �����&@�?���M����s��CY	�vLjf"c�u&8[N �W9�B�v&���=գ�C��R9	�E`���Z h;���ǧ��.��p}N�lRTG0��욭8q6�B�����T
ΏMS,Z�Ȯ�W�`B������D^��D�gW�(gW��D$���kT��,�MQ'B��]���@���zk*�O��*�iC���% �Ɛ5��t�+c@��О-����yPM%]� �fo��f��EO0)D!�������[�0bg*z�B�J���g>^�I:�{G����)d��c������78{�É��;_\�
<�f�VW�^�82rÈ����N���c0CO-xe�X������� `�P �Ȃ.��#�K�{�HO�L���N`)��H����D���A�����3N��s�~g��c���B���5\A�xtTD�����ω	�b�FݮZ=K�R>�$�`9P��9	�tX	V-�V�N��ch�N�J�.o!4�14;�."��"��>fҳR%m��Wp�4S	�g�W�1�j'�Q[=����J��-�� ��$�Bd�·�H����Qۼ�2q7���!R���>'!��ȤTI:�ω	)�%�JTC&���<����F��Ą�`!p)B9�[�BȫDI�{���]�B�xxv�ռ�[5���)����+!��WT���)�Bh�k�ͮ��)�B�G���T��$%&��+rP�x�B�LG�V	lL����%-3�$�Zg҉��#-�'���_ОJ�βv����Ad�;&!!H��͛[{�>�J踫�;��n-82)�y�jX������&�AHfBhKV�'�O�ǁ �f�#G	%�ivN6���rF��/�ypJ%ԟ���`�C�<LB8�Ra�RZp�I%8�f�8���?� e��L�a�I�,'��G���j��|��KB�[���Zt�n&�	E2��L�E瑣�C��`E�[t�n!�TWX�FZ� �)՟J;��Zt�I!��u�f��u.Ȥ��_��g5�����_1̃-:w�~J�z���L�Ԟf�ۢ�L�zl���y`/v��Ā'�Dk�ǦK51�{3I%ٛpE&�&<}�E�6�"����LZ"gG�dB挲yқA��G	�'$~'�k^��0��r���e�y�% �9�;����q��������1�O�Ao�tA&ٹ��J0ssKd2s%��W�1d��EXn=�DK�
G�B<$bB�D��.���@��(���;���RW�%7�tA&�r���J�t���L;~X�A���WpM��+8)N�4t��:��Bi��L"��v}2;o%Ԑי�{So��(�@�T_ǐ�OD��INxe%�-���d�oX�II�3��,�{TW�����jz�-���I�����B<�at�kx�#=��y��L�<G� �i�A$�N	hw��w�̃��Q]m�14ӣ��G����?k�#G\9|��ҙ�"����D��<G� ���N9�"� �����Aٛ�#G)�o��%JT�*Wd2�P�y��[����9I�֯H�hű�e؁����A$�Wm���_ww�"�V�~EFu7ϑ�����٢�[q��B���J@+���q������E]��\�U��Z\	f#m���B츜�UlA���>Y��m�
��'�ov%�u| �P/؂Z<�/)��諵���$��-����>���&�~^��I�<b���kՉ�g�x�Eʢ]��nzu�e-���Z\�';��N������)����.�d&ۅs�~����y����Nk+![=��.�d�'m��EKW���(���VB�p��.��,����}����������A䡹6s�\�h3	��O6�f�}A�O�\!��Z_�^�@! ��Q��mЫ��:��`��z�����`!d����֓��]�$��w�u&o�)&���Һ,��uW�B>�Q��u��w%�Nc�&�ݕI&�j�+��|?��$5���~P��/�i}?pHt8}]���$���\`"HƬx��"�W����P��N��J5Fkg��C��8L(N_am����a�!�w'Xhod2�q%4�i{� ��1p"D����q�� ���m�>I��V,��4=\�I~���+�1WB� @��*������~!�Q3������\��3�l =^�I�t�ho�<x�@��z�xaD&����$�z[	U�j�+���x�e�xA&�|�^jB�f��K!�,���݊�!?���t�s�^��[�w�ɜZ��md���@��H>4�������3�N3Ͼ!x�CJ 1;���K��~��癗_yv� Ü%�!d���j��=Օ���wp�O&��v�������}�;4�RB�,���}� ��,CX�Yz���XZۙ���7>��W����"���Zdɞ��L��R�'BR�GO��	:�khн�qJ�ӫ
FV�h����_^��a��x��Wm!K�5Y��Ķ)��2�2���l0�8��b��Ӆ��:���&7f�	=�硛��.�9�VY!$��v��C�\!�c�Vq��~�Z�m^�u,��}��q���&z� �DH�4K�����ɽ��Pl��O.��QE�t-.�dI}=��C�y� �%��h�Eb�d_x	<L�܊yCϑ�8��L�cA�A�6�K�QBI���b��W.�XOc�������zU*��<�k;B*�1X]�����'�B�cw���;�/Z���%\�I"�I ����T�.w���bg���2� ���mR�Pn=� �tR�嬖e��v���\%JZ˩Dy	<B���
5h�z�`;�!��&uŃ�˅7Q1��`�&���aBĕ������\rmC4{�=��d��V�;a_�z�PS>��!���ع<Bˋ������}��׻��i/kQ/��t�OQ�BȖ��k�09���C�F���0!�~E:m�"�� `��� ��|�+辁�+0�)W�
���B��&ݫ���y�����՗I�(��Z�l׵�e�m���`{u�8�c���1�rN�p�+������po�9I�����a��i��c��jZ�1Y͖.���WZ����(�7/�޼͗I&`8��/�/�}�P�l}b�����3!ҿf�Ğ��}sc6�p,�!�tss%�PC(+�zPt/�	���� �����$b�\B�������Pq��3��W���'Ưc����$�}RRG�E��� �G�B���ܱ.��+8�E�E�pNg��_12�z� �����+,v���;D@ȋL��T"O"͑�HpV��D�^Q� ���Je��9��Kn�ڂ`E()µQ�u���$�ᢷo~Ob�j:����U��
<�Y'U��K�9"v��4��n���,��I"�₈m�W8���m� R�,}B��%#���K�}	�"�=2�C�D7��\+n��Q+��_��ܧ�KEX��(U�. &��@�n��+���C,5;r���!���24T�AF����(�~WU�kbD��,���
�p��h1�F�TA�0�+s���W�E����tҟb�?D.t1����=,�*�h�.���Ყ�:
�@�!9.*����x��.�'����S����_��8���:$RZeC�ٚl��o&.`��.�1����ß�֓+IW=�|O#,'���lM��m��S���ǆ�Frow.�;{�5��!���,+�	q��̹�E��?`��O��<��>ɖ�l�$}(=�!n�F��=�G���ӫm��_;:�dt�}tnq���Y.��=i�����I3�|m��؞�U��1[)�4�ܱk7���F�dn�5��5�����,$N>\#���]F����    ���A\qf���Re5*���3rL�<8�.T�]�}�s�a�p��^)�)K���`C�.V�����`����q���4����P��\$���p�7�E������CF߹Ĉ>����wg�@|�7��x̄�^����f��T�i��IE����K$A*�YqCA��~�Bŋ5-�)��=�3��"̛ρ�����c*H�p�1��\4�l��q�+vaiN�D�$k) ��yfH��bѹ��H\X�T���qʠ�@�t��"X�U�"���IF�5��h�+��%�e��hq�\f�XO�I�ʈv^Z�Z���9ψ>��S��=ũ<c�O���H7U�[OpT؄P#�!\{*#RNqE$�����v<�"!�#GW�\*c���e��/�H��:�X��T_/`H����.!wa$�;�d�� GW�@ڜ�_ *d�����N;�"���0 ��4:��T��C�2�6tf�#Ō9w�سОc�5g	OϚ��H�������lJ��uZ����)��ک��#q���nn	5��WX��.;՛���#u��-V��4�S��N8�;T�� �r-_XnN��-Re�L�����iAı��ʭ��̴B�P*��X̌�5
���^�m�d��wGLa
d2������'�a���f<�n�#p*�Q�,B�]�����a����j`�~AY�d��(r�GqA�H��
L����k�bDN�4
s��ՠrӤ��3��V�qA	6��-�2�E�6�յLD9�� ��,���Ga5"�T�����}9��{T��,av6(b8���$��T�����c��s!
1K��r�p[����ȳ��o�>wʏ&�����1��ьWq)j����2�d�Gƈy�9�D-�\�e������W�խ�Q���r����ܡ�>�*�q��!O)��6z܅S��<U�*V}B��b�=jR��Q�>����ļ.k*f`����$c?��
Mr��+3��i�F|7��/�m�tT�En��r����g��N>\9�3� YVƕ� ����x�x���OwI��d�2��&���������l!���ӱ������&5�\�aAH3lE��:FDH뇈�R|W�(��D�!�Fv}��N�������.+��[+/L'׬S���"^��3��a5�U����:�����ث�s W�Iɬ1��f��r=R=����R>-k�B�Q*�z�F�Z�&�&=��kѨR��蓫��ͅ�è���❪uN�W>����H���k��}a���}�<�1��)]���2�8��;��V����G;�3�2�梬���p=��t���'o1��cxf���&ٵ3��Ӣr���Nwq7��h$�gFv��2R.+����kF$q�̈d�1:��*�����~@؇����0��|��lf����P� �S����@��OA3Fv�_�~��>eDI�&�0>�WD5�Gd�q4B��n�&cs��0��ޞa_�veR�cǨ����K+v�3�F)W��n�����\?���U���u��	�3	"��F�j:^g&CL��^k&E�I)TDJ��ccݏ[,-�<��ѯ�'8�^9����c��7e�7�֦^}'\�O��i9 �M���X.����"b���Ad��a�Q�Egv����;��k
W�0
)k� �j�"]�A����G�~m?F �uQa؎cu��2"A�+b��>5AL!0a۬�鰌�fr+"����%��(�8/��d��iE��%6��Ĉ��4�u�~�?F�V�j^N��67>A������'�5A�yQ�GVs3������s��F��_�p�x�컯)�ra)侎"��!��_� ��(r�Gq����,Z9�u�fg�l^W$[����3��O�"���~E���/�"�a���n3f�p:t0��:&|ą��C\�OL�	���ם���9��Fq�n����d������>�S��"��_����4
����Gv	���]��>��u�+B�d����ŷ��3b�!\8=9D|9���tB�p�sk�|B�v;I����,[����U�O�R�_�!���m�tSD3K�ҙ��ێ�>o��re}��� �O���Ei�٩�EI���1�GM��L�`�h���Q��\j��f)��l�$m�tE�nNU�0�:
��0ąwQ�=��3�7�6��T����R�B�3^�<���ʂ`-�>���r_t>��ј2zl\���Հ���_�P��|�?���c�"���"pA��Sq��:�u�
br��A \�|�h�ֹ����T.��Y��,{a����	�HpA�,�N����H�N�=G���uF4	����`�o\��hc~�W�����hb܏�(ArovF̹��{�|IVZ�2b�fD.� ��	�߈-�G��	�����2�Qx6��t6��Zu��F���7j<��C�d��W:	A��"�� �o�bNiz�4)���Q��t��󊠃O$���(죘�������ޢ�6����{�g�;;�	�۩~�!`� .�
���,�X8\O������o�p=~�+�]
6�#�+�]�^��`�~fV��3����{�$�]̕a���ň��	�cݳ��Ѷ���(�A���,<S� �f75]��\y/�!��Ԙn�?.��8�bG� �Ȯw�'����(���q8zovA$<xH��~��tr�9L]v�I�C�ݜ,�T�pBpA&EO:��D��E߄�E�kE�Ҍ@)f�{ĭ(�V�1>&���1��d���;5j��2œNF`<�&��rtQ�B�1���Z��t�c��Zv3��2u=*J1Y'nS��wv2"�����ԇ����bDn��m��ŕN._��V���"��".8@b��BB켨�tJi���*�������?�:ݙ��<!�t;��.�|�4��M@���Qs9!F.����\�#��^P�་���M/����(�P���3:��"v�X� �\�g�T��'�_}OiF�����4�>7�	|3��a@7�i>Óe�3��E��$�����*A�cF=f;�D��A�S9!������eЕ�O��w���V/�#s������ݡ�׳Kd�)�§��0,�"�My�^<3�E���"ֳ�gd��q�����"Ɓ�N�����+R���e#^�NQ\���O�E꫌~�\�# �� ڟ�+J����]G,��!�-��>�"��Qp�E1�W�"pt��~���TI��呫����9�����8_;�c2FD�ب�<�~#B��=���M�y5�q7;h��?������w���"�3^R�+��iN����
d
�t"���"�U'�a�ҬL�X�2�ܾQ�k��Q*����>ĕNi�|�Ye���*e.�􌀽4����}Ht�Sr+��!�[�C��ĉ+��'���ݳ�}R����R�)���$K�g�-D�W:�_Xq��*u��C\鬱�����g+�Jg��<Z�b���6
W:�&ޏe��F!����A[dZ�&���Xp��q��Ԭ	��K��#8ocEH�OE����z�+GE����Qن;#$)�Np�oĈ�S_\��NB�duT�cr�F��utgD����\�� �*ZM��I'pW�~|�C�ͮ�����qt1�u1$�oĈ$���\wL��HS�VCX�V�M{��<�Q�/�~#�#�F��Zm�t
���1��%�o$<Hޏ_�o$�rl�k�Q�*�~#Aԣ~a�:��o$��Σ�VU��l�[�"Jo��o��RY����� �\An�#E��G��,��ۊ���,P��#8�~#BT��L��cI�߈P��(�Ǜ\��\��� 1�Ƒ��\�#r�>$���q�3�t�#O2�~#n܊a�(��0��q�{�G-�bu4-����)L����Ml�퓻�B�'#$:���o��u.1�Nv�ĘWFs'�o$�||�"�'^�N��(d�aJ����Hi3BK��fw�F����uh9�;�{�32���#�8�yF�8�Y����    Z~��;���d!�%�<��0�	-^�� ��C�}�`Iq].�o�yA>��H�f�ۇT�x�2R?qwȐ��O(Gp-�Z��R�"�Qr/+��z񞂘*�bT�On�� �1��#r*��F��6�lѲ�M��L#At��(�b�
��i�Uo��y.�_��\R��J�86T��ѓ�^�OR��cG:֙hU��.8V�7��(�\EӢwD2��p~6:W�2���v�vg�H+"�h���jpɌ�����z�A�����Nm���z�T��h�fͽ�AJ����vm.�����(8�q��ng)i�4/�t�şEe������G/�&��&�==Aʩ,���ش�pOO`CH:��Q�[Qu��K}w����� 8�n�>.�N�&����鮄rL�#"���]	�+B���,qǭ�G�ͅ+��+�LOApS=���O�����ྱ5|{��T.�+�X�!#�`�7���K���v������V�C�I�֟ﰕ'���o��؅�.�r��b��M�]Tn~��C��j?Ϯ��ce�s�����8̮����vtSA�0@�4s��|R[km�4w�Z�3"J�iW�+͝�;L�f��;�jf�Ǥ���rG���{�2��Cp(���1)bR�B�������"继[~��=�-���tTwB������z���>����ծ%FR�����v�̺�G�� #�K��nP� {d��0~r_��������(	��ZV���H�uG]dF	��e�b��6�R�t��\x��8��+��%��J�c}�a��7	����H�4���)ļ.,g�몸m�!�(D45+���b+(+bxC3��~F ��[�6Ƒv>"�2��3
/C^	���~�1sa:��9�[�m���ŦV�؋Me���ـ���Vn*����%��ʍ�,�&��&F����B�N^1ApǊa��obD9����;7�-���CG垓�'��� E���S�2-��\��w��&F������N����eD�1���q��~a.Dm:#L��^�QA@��(`(
$�F�B=�"�K��SD��b���`�b�]�V�p�d���)��0yQ�>����Q_�(P�FqAE1(��6���o�R�>���o���Q�s�exm.����SQ?<S!�z��&����
gD'�΅�oJ\ *#�X*Cҹ���W$w��Jy�.�i)�-�/c��Pbs��b�yI`���]y���y}�8Q��4�K9(f�A��C�?�3bZ�y����u��������-?a+�����n1e�hp��M�";�Ӹq;̋��9y��������_�]�s�e�G�h$%��!��pDI�6Q��g$��=��2�������B�.���)Z���?�L6��LfPF�6v����9jg��x���"��\��@ud�r�2D�W�G��Ƞ��+�WF��s
��@�~:2Т��gO�Ĩ��-0�s��;�K*¿@�%jz�۱�3�x<�X���>2b�'F��<�Q}`���R�v?��~ɣڷ��v녏�w�=c�����
���U�J��X*yKzU�qw���ha�����R~oϚ�[��d���el:l�2j>lGU��=�J3��͋Gڛ��6�����ђo->�*�S)J/�ڴ��jز���H��E_�y�����M�UK�q�p�K�v¹_.�3uЪ z���g��y= �?'�e��s\G�G[��=;��uE �19��)vW���Wvn�p�ۇdk^��nO�{�0����>卫N���M;��v��h�ԛO�"��~b�o�?��w���i4���)9��)"I��	�䱩R���ƈ�����0,Km�D�at�wR�q{�G��Է�~?�{~��N����$v�|/�.N��V�$_�
�T�0#���i�m=���ٲ��MJ>����������x�k@{~���6 #8=O�O�;�+�MJ6�!��l��SD�pFH�0M"�߽u��һ�8}����������Roy�x{m�M�*�h�_��Ǽx��Q�0o�h^�����)q��c�U��zq{�����3v��ɽ�î[���=�x'M����Y)﷝��*yfGΫ���]�m{>�~����Y͏�DR�Y˓"���9�V�֬ߓ�����R��n���(��In@k���>��c�s��0����Q������� ����6.;��pF����������Þ�#�Y�u0����T:��0�5�{������d�pNxF`E3v�3S	~��)�Є���v�w��!����@����?F�'D�%G\�(ݱ#�O5n��U��	���Z��{V�"rjfD��^A�xJ1���������{V#8�9�âjь�ǆ߫*�/� B:�G�:��V�AJB��@���ɧ�x%׸ 8Y�_=)�,��h���ye� nI?�~Z����2E����)��ѓ��_��¦�eB%H�5�g0ZXfC� �l|�,3���lHv���{f#�-^�[�iƒa���Oyݍj(D�P�{f�"�h��k�K�u'�8l�D6s��Yf��/v��(�Z�!^�y�'~��)�sra�4JS{+��ѭ\�1�8�wO�!p�> p��� �0.����#���Jg�s�q�K?+P�S��H	Cp ;,�=��g�)�nՌ�(PlF��|��1YAχM߲l�R�J�t"���&��@5��e����qA읹�{'�a-g���3�AgxJ�(�W�;~��B���R�J'#pZTE�+���S��]�BK��\�g'�׮s!�m�\�g']�yth�EjD�%���ǈ��l��b�lȅ{�^��g�X�5��{�����QWS��Dt�S������M����Hs1N;\ ��+�{n�Θ�uoP����&�@4,'D�g7=7��1HAE�u��y���7�h��@�h~����#MұwnR�ຄ��r�'H��]�ٲ���Y�ӗXx�d.�HUr��o�b�Q�� �4~�N�ࠋy>�'�9�ҝH\�'-�4j�#g��;R�u�1 f=��Y��8�}�4������G����>#傘q�� ��8���U
wF�� �|��=�q�;Bj��y��S�2r��
u
�{��`��N��o���1���T�zEN�hϺo������)i9Q��y�D��mf,�Q��4zEy�0E��(�?�����Q�J�<�*��*�m�Nht�,*��~����\�y�eVą;��V/E�X��V��)�s;}
��0���g?�h�|@�ѦY���H����#Wz>/e�Uq��&��i�g9"Fl�Q���VDN��^��kF(�p걊W�$��R=/,����[�詮���;z���h�tE6���M�÷ڢ;��L��!��r����hR;���8.����x��X ��`���`�]	��P��z@���)�M`��6k0h����G�H]��eQ�7d��z����ʈ>�!���3U�s1	"�I�h���x��C��{qAH�4Dtw+�@8�?M�L�kRh�$G�	�+��/�\�)Z�瑩'��O�+�TMU(�k"�x��(R2cbq�J� , �($P�
'�~�R�����'���K��(38�:.	�V�w�
����h��,�3���u�P)0�������O
1Σ��0�i,�_	82�-�VAgD�ׯ$^!8*,Z�&��R%~�ʡnpr8x�vq��k	�9G��؋BлQ�\�1, Kt�K��z�=Zi�d��ו1r+&ՕQFªv��*�o	�*Q�ˇH��^�ג"�~�a�(��00�K�bեu}K̈�xI+bO �w�G�_?&���z���wW: ��J<]T)��H#�|�[8p�Hb�NpuQaԀ�UI����/)�x�����_^�
�	�-�RxR�mO�˶�F+��A;*�"E��nI�I!�I�ꣅ딻�Z�����H-�3�c��bX[�t.�IΙ2ZF��5�q02h������z���i6�=x    Jr���@i��@Fǧ���uI0�� ����`��H.�SRǑ����k,�>&{��$nD�"�=K�r���j����>x8��p;Fmr|�d3�~y�=�ʽ_�yy9ږ���V��-���]�G'��`A�ce\�$R�`���������y��w�A���g�F��q$s���$�v|�b4G/�j����:
N������D��p4�X\g�g�}?�����S� �~F��qp?,��zaiA�������~'�p��2it��/�)�� i6�����0R^���.�k��1��u�J��1c 0�b����������Ⱦ���G3Ҏ����e#`�/R6qEN9֦,ҁR�L����Q�ж�g���)�{c팣�fGdC��Qf�1^ ��p�����)�rj?r��bO=��Q�p�֗N����m�����j̀`ă�� #ܺpօ����4�al,�{�0���<�6T����18�.�;T����7K�$��5�uVQh=���_K�DFd�	��9IswX�QՓ�"�_�h0��ߦ���!�:�a��3�<�!�e��Rf���h����'H�"�K��H��T�ЛiZ�V��<TF*kJ� P)���?ډѾ��EtjO�����cV�{>�����η���~0��TEXZjŬ,��q[�Ũ|�:I�m{+Y���Vܓ#i��&��e�UQ���e_�j�cj�2ʌ�ɨA���(f$��D$�z`Vփu�������ucP�hۋD3��pO~n��9��܆�Q�����^��|f�\n브��ۧ�<n��p[w}�RZ�H�~�#XtG����P�!\�*���ǡ�(�&���M �u4�\Ҹ� �(TFB��ٷ�t4?
�Y�t"HCHS���"7��Րʬѭ���MȇJ�iR
g��[pe� 1s{�E3����d��(\z�s= Hk�q��h��b����r�@0��R0Jܶ��H6�������J:)�-�E7V
F)%�ցѫ�^�X=�sS��Z��<Y7�;!VzѾ�3T�5sOx��̝}��)��u������^���j�������$�IHb�_!�]�oˍj~<�pa��z��TB�ͭt��I��h� �H*��� ��v�ƾ�#u��E��u���[�F��$5�=*ƈl���\!�a��A$��f������\���G��徎�����i	ᾎb#������*�a�-?��R�&�i�|�5O@�㶞�7��v���A�Sr�Y���h�/���1&ͭ{b�V����l�ːJ��:�2���Q��yϫĕW��m:���!�բǡ����`n+�B���>1#�xC��@Jy�a�����<
M=v��H��V?qg��V�hgk����' �uv^�:;7��)���
;,̣ݎ>���3����z������J���?m����06���l��ƀ��౾�R���=h� b�������J����A����,
�6N�jm���7x�>��
I� �a�A����T��'�H�J�o��W+9��W���P��pU�̫j�_�2m�q��Q� HE��h���yz���@�!ܳvG�W�] $���uD���r|�$ݭV_(m��Z^0���x��c�~m�}1�숥����S�۝D�T��I>7\eM�U�MEh~�
�k�;���uC]5;/�al�T.%�oݾ�R�A��K��� &=�ͧ�4�G}*~x
�&[�� ��/��:�ry�@�,A4�XeĚ�}!$Ӛk Q#�Va}����[� �'F`Ȅ��[�:�~���e�zoo~�����A�?�j�斘
�6{� *^�z<�6�'����>��B�e/B/�^�@A�P�/��%Q@��YdkZ��K'"#	~ߋ��Xi^G@A�p<+?uPuWvL$1�b�J�[%�-s��j�z���mY�NW:/4�C�O�<�t��:j�PW�2#�7���@>)�|l(gg�P��~bJz��n\���b�Z�|!�l�>�K��?Jwo^S?A�Sr9�*�ấ���ņZ�A�[
��{�b��-�#-m*�����Q��k��"�]�G�Oq�1�z��Ws��u�F��WAT;_���h7�J�@D�
�!<y�4o�GI�&ݿ�2F_[�(��lv�ϞL�	ǋ�I?�E���+F��)�4ű��(0F�#Ƶ�d4��2PǠX��>���V�)��)x���p�ۉ��y>�U�Տ���G�o��v1���!�'�n0�5����nQ#l�򊰩�}
��ȓ��nH��B<)���*�9h�J��W����	ɪ�z�nKh�*Ѿ��!.�?�$(��O�����7ƿ?�W����_S��As;��5b�v���Cz��l�^'<�-�G_��5y(7E�ٺ[F���_8R��c<XZ��_�X��0���o���F�\��ҹ�e?�B*DzBXｙk�BЋ	�ӿ�h\��Zܖ��.��ޏ2�����),�ֹ��oC���6��y�i|+�o��e�Q��������:Y�S��@�+:�{�>e`N˹Tw�F�a����@�V]O�u?�K�Aj���t)	g���v0Ƞ7��>��'���j�������U~�����ם+c��������n�`Gb/�#�Cчy �%%=/���ǘ��j���2M����+a�y머D]�W=���������zPD��sA �J����*EP�&����p��f~��ɧ_҃wR)�Sp)��t�� �$Y�*��Y!1�.��o�n*=Y	R-o+�r-���V�3e�ן�����o����3��O���P�N�)���������m����6��X�[�5�X�ְ����zz����đYI��߇���V��\X�7��r:}�8�1����C��lv�^�e�۹4䕗�u�"(�����W;�m{]�������KuG;������6���Av! WWQ�!�f�����?>_�T��ku�56�qEب�^�U��׮�w��3ҿ74Ơ~C��T__����~�+$s(G��@FsJ��du�Tߦ(��u$�nԿ�ƌQ2��a���6�ػ�����@NK��{�ȹ�L9�r����a_���u<�$�=!��#dƀ>=�T��x��:(��:H+����1j�uTM��ͷ+/)/��&_�P{"��x)'��O�q�2��~>̕���I�7�Pn�`.��c��Q������|��º��zܿG�����#x ����@J[H9���?�҆�zHi[D�O}�%iₐ֐�5��G�^�q{�{y�0��<L� ��!��\ǕQ�o�nf^ƴ�2�_C���wP���F;V^����6�G8���Ӡ�	���O�{�3"������j�8��}�:��U��XL��Gׄ�9uy_����-+�±�evI�_�+��B,i�}�������e�ך���u8��q0�[3����Kg������i�@VԖc���[��T�yQt%�M���`N���k�×Նy���qG#K�N��Io!I �U�3��͈���U�q�5o���Cr�J+w�K���h�w%�v|i��@Йy�h~k1kGp�5��:�u�+�
Io!�j\qUHy)q�U!�BqŕK�P@vB�������$�����$N��bи/��A;�GܔQJ��:�nM2���2��wa���ڶ��.$����հ�*�M��i��e�7��Y�2�f�#�)6�G�va 5/�ni��Y|YE�u*��M��.ėU��hS�Q�ԤJ~|�	c�V'N�*V99�D���l7�k~��\�D[l��k�c:bݣ�4��#-����i�£���f9�����Ύfa����G�00Ae�%��_�p�h�e���;�4�Y:� 3hs�+�z�7�&��ιI�ԗ�ƭ�-m�O�ԗ^����x�FӖf;� 2(�fS���%A�}��l��O����5������a���n�/�=J= �G�-��A"�{@*O���Ѡ���l�6�?�&�ҏu0���-��     ���5�.�<������ʥ�[=��3����q��� �MD�͊T)���q��y�%~��S��oF��3��P�@6����׆�]��r�ߛ�}�~eF��ƨ�5� 3�v+PH�[Aq�T ��A���$��x���iR�J�Q\�*=�c�-$�Su��z�%p"ʖ�/���r�2��)����!���Iin�K������jS0�S /��\m���hO|@ʫ?���\o6�R;7}F��x"�m~��XD��F�n��)�%�d-N��bm�X!dژ���<Y�)�<�EB!�>�і����굳�? yn���=�#])oV�˵�Ϣ�h����.�Ym��z�*�0�S�h�V��xh<\TTs����㟟���*?�N��7
���[~5ag��,fE�HFcW��]��[��-uB[�TM�ߋĄ�w'�TG_N�Q}1f�vA� zAo�#,Xs�A�P/����Y��uu�k��)nu�T6Ut��(?�ڵm�lg[�/����4.z)�Ӹ�w�}�v1߸j?����I��5ZRE8�/��ij$�����k\�,�b��|��U��L�&3/m��辨rX[MWԴ��mlG�;���`oax{�yY6a���6�aa�K9�Ӏ��������ϟ���D��#�ȴ��)�4�nt_|y g��+֒t�ѱĳ4W�G�Q������,�x�C�D�:|��̐�w�V�^��/�����8 �C�q��oO�%05��f��巳�}{��cY�q�GU{�k<X��89T��0$`�.dh�`�'l�B�t��9%I�9��ۍx1���`E;�܈.�S#,�����ZRe�p2�����3D�R��}�|#}�����]����4y!�9M�X)Lyݍ�mX���y̖�Y�L�x�{�;:�E0����)qr)��ب@K~�Y����(��G��xR
ȼ�ƾ/�'��wn2<��{�{4i�!z5V��rZ��#���;���i��h�:��C��}��U�ƈ/�ƈq��o���(�����*k���t#x�����p[G?>�'�(iI�3H��ӕ��]g۾i:+o�t�!�]����U�?��]A��օ4m��t!��r�]�X#�"�]/*юuD.?�u��ڸ�'��:]�6L�+�`,�%�R�n��(���+Cⅹ�Hk� ҕ:	����rA����wժ�K�ƈ���`gc���ň�(���$h?����~(�Y��J預B�{Fi9�)M<�0��˓>���٨�,���tܥt�I�u)ݜҢ�ܸ SFv�Ƚ$��Nt�Z�&��&����F@����1^�!8Y,:ڣ||^m7=�}hLf�}#@���7�$��?7�4�ϯ���P����~~���8�?�*;�_�>%��j���[�H��<�b�'rv��@H%���*�(B�,�/��"<�z̦,s�?�IA^��R�}���VJ��@��;��(�CEث�0�r�/���xuc@���q��sodo?"J�K^�%r�-^��[8�x��K�>�s���F[ڌI���-����<?����U������{�&ljߗ������|��58��*�7��T��b����y�Dj����մ�>����H*o ɌX��K y��]m�0���R5�;���H�ɮ�i����h7�Ő�Ҹ��E���Sa�a��)lL˷�F��˹�<p��>�1�9���爸�q/�����̫��X�6E�۪�S�(q��Q��^��KS+�ڟv"<����WQ�E?�?��LMu8�Tq&O��P���m��k����ƻu���}���a=�4�/�`Զ-�- �I�������-S�C���:\푸y�j9�ۋ�e9V�03. i~l��kR�}>�WH�r<NB\�t%��"����J8�2��i����qʕ<�ޮ_'[\��;D���>Y	���Vb}�'�}뛥��~ �/���'��1�U<��ɰ֫;D���+qڴ�nb�2F5����>
�S?�lԞ� ��!.��-'"Fs�����B'����Dj���t97���Ɗ@J󉰌�x ��k�7D5oQ �T�Q�y��g��.<��!�\�H"��.������q�Еq�R<(���z<�6��!H_2�e<Q�� {h������ղ��e�ɸ4���+�?�t95?�6FK�u�f^����QR��=qu��;c�j^=�#9T2r:84��R~D�tJ�`�u��s����)%TU�Е��ǻ�Q���
Rޭ�_k�|��(��A�W

�:�b�l�n�xD�D5�b�|�o��YJ�(��Nk�P���`�)�-�(e<�4�wJSM=O�g�����#pMxD�w�q�DmP��%�v�duW��E�A���TM�{���e:�����	q2Y�1b��C{�O���72����I�,��;y{빓�a\� a�V�h�Q��2�_�
�{S>������/>�c������3�֗�4p����"��OD��D�w���	�v�.��\��x\�j{�n�9�w �8nD��c����9�1&'�ߛLp����(�\NHUww?���1Lu��M��o�D\������ʸ!����	<@��~H�M�w�]��1�A��7��#D��E�/>?�P�
�Ad�W�2bͱ�E�½T)��*�^��]��P~"�'�!�'?��L�ވ�F��H:�#\
D٬nA��㗰��(u7�%7���*�����'YQ��B��OD�V�^�Q�mMC��K}`����d�M2�SHh)9�sE�O����ڎFAXFT,�M��"��Bט%8{�Gi��/��b�MV�,uHG����/,\5�2�ϧi��YN��.y)�(
Q{�;�g���O�%Z1�$n`�I%�(��2#Q�#$p2�"�OD�k�e�2��OD�D�H���FԲ�c7��%e��i��J���G���{�+��Dq����(�����d�%IS���{/���z�6�TI��Q`�]Ě6�V�Q(g/�(��Ō��}����]3Փ����a#��@.�>��R�k�P,k"~.�� ���q�7h
�X��1���hp]F�%��rid����!��}��]zپ\�2�M�7W�vd^l��5Q��m&���ⅾy�Ɛ�R�>g��րĞ-L�-�G�=d�1�a;f��p�cS��EL��>5H�'�u) %��p��O�Q@/��R�-���#y�չKw9��-����)3�ݞ�\_J��Ҏ&��W�M�%�f~�O^�������e���	�+��7+��~�
���hf���5�z��RD��J��L��DT{��d���k�x&bݤ��.�����wȓ�&ys�;�\N0�i�0z�:P�&���꧵�&Z�S��2ғGAC�ۣXG��O�NR0R(�uXF_��:z��u� m��NGHD�U��BlS�S���{8��L�^�k�Α���H����n#JJ7D����>+��A��(x���:�}G��YC��:*��NHU	I����.U!�աx��K�רH��ᾭEG��艬NȼV�;�[�艬b�eK�� ��	䉬�B�U.�.��Od�Ի�"m+�;�҅�(��]�*H/��0]�k�-���:����.|5B�}5d~��%��A��a(����u��):�p�؎�ݱ@0$�)�n��ӈ24dCpF��A�i����)u��� ��yt%���.�XE��VJjF��J+�ږ���ua���{�G44�OQ��T�&�Ï�_nqq�&�Ln
ZfG�tv:zJ�-�JQ!:��%O��V1�*f�B��h��p���j���F���-t��H�������>!]�K�������ޖS���������y��DN[���סm)1�ɛ��f��������ܕ�l8��`�ϕ��Ȗ�zA��䁬r7�x ���}G
�!���(a��������Ͽ���������8vjp��x}�Sc��ڱS� ��Ż�V ۙ|A��<|�����,�ae��m��h�q�W�5Yvn�'��O|��{%    �EI���	�/l_9�I�)���E��������򶝶
ov�7� �m^���OzY�����P޿X�����2B�C�]C��E *�_D�G�"��M�Z��I�ɾ��ju zX����%s,y#�1V7�"���Q���ħ��	�nzͶ�|�����Cl%�N�o9c
�&���qb�/CrT�o� �#q���dm��ݸ[m�"��(�!2 (����KN"�e~v��(d��-�F�ud�L�=X���aH���$$���i��� ��$y�̛P�=�u���!���Z@"F�x���^ǌ��PP�1�da�* k o3b87���n�YE����Ia�����82"]�e%-���!��x�H=Mr�d2N9�ێh'��p}�����z��DSˏ��q�n*���23��0Vo���/c�(���<!�*�����0LͿׁ�R�sp�:<߮0��'��c<ZG	ᾎb�\7Z&��jh��'r:��pC�yA�#9�'|����U���?�������)N;�Ѧ�\�ZMB�X3�w����w7�b�FȲ��-��VEc;�r�� ��x��\̘�nB!c� �7^F	4·�*j���?LIotY�����b��W���+s�e��厨���$u�!w	�"�x�/!����4�t'?^Ɛ�MB����*�R��-�2�X �'��i��W��
͜��p;H�#9<�W�Ao+��A��y�u�!l�D<�ՒC�;�����!)�Z����e�bD��DZK���Z���z���a�)������x[G��$��V��r[G	�����t�z˫�07�!yw�dk��,��2f�oc��,�g��!������y�ҫ�@v���(��;hr��DR+J��uT�u�8�G|3-��єu\jЇy�W[����r"h���2�
�Q��Fer|"���r��ƁY}�OnV��V���\J'+IO�j�V=�#w�'鉼"��|�"�Ǚ:�7i��I�	���~�@���A����� ���8W�k�k�R�i�q��*��Db�?,�U���_͜z_	�^W�Db{i�'ł�So>��8w��C<?�屒����8���j��Wb�]OW��5pS�=�uU˟�ps���+�G>���X�hy��	�i�|ξ�ҷ|S�X'Ĝ}yE-k��E+;�v��j@���%IhҨT����PY!��V_����v��xtG��_��R>��#N���� )�����V���P8��c$j1�wŐ����/�A�
��ެ�⨹�1L���'p=鞸�+fl1C�b�t��c^�cK �����QĐĵy�yަ��' yKpTH�D�L�v��~{��ҁ2�ڕ!n/xB�c��HO6vO�T��Zfz�]	������eD��gI2cj�RO���3�7-0��j^�L่똶@���X�Z�#X�+�����7�
D9�3�%�z�K�����c�K� )���b�uqM�7������^Q};���N�PE�s$E��:�(5���ޚ�yAr"h�+n��S���;�`�ю0
y`�!L<��4�Q�Bm�V�WbeM��V+ Gh�h��x}�[�Ō��m��	����Q���ͱ�~�A��8��:�ݠ񠿒�YX�J��mm��¢	�b��;�z���:	k��\��D5�@���I�D\�՗V@�&.
�&.��^����4��=�V����fs�|.�Z���q�w��׬`P<w$sX_v��:�����0����u�2cK�1�����s�Di� �dp�/�bH+�ifWu�01��ۼj��'�J��=��!�o�w*��"m@*���q��*��N���u��N�:!���?�5������*;�}�$�"_cK����A��fUyX�v땩9ټ4��,��X>�-�!{3������*��~��เ;�5p2���7��!��3�I�^M��w�
��_F9|��|��wYr$���^���,ctt^k�1�-�E|��>���d���N��#�}�M����	�.���Ҷ�

�&ů��}%M-�����9�W�mR	����KY�-�T�fE���ukV��º^��GY;��L������֋!ew��4!�����ٚ�z�����֖w-�u̯h�2�x�?�o�5T�)ĵR���WǍj���Od���m?�~�䉬6��noe"�я���x�@�z�ʼZ9�]0��@�����#�s������ r�:��ȅy�R�H/}�+
��S٠��20]�@X���8+3(��q��q��o�ov=��ݤ'�ڹ���nжP!��
�0�h���JO�uBҹ'I�'�u2�n�!��zP���Ƕ2�TF�UG3Xڏ	�+�̒=��QT�r�f#J<�H&;z4�DAH?9$�Z/a����4;$�Z/�,��"n��Ƭ2ωx�2O��]ܘCx������=���m%����˞�*������eq�V�_n���޻y��H���\)J�x �,����8�U]�DT�[)N�,E��mނP+�8V� rN�W�@�("�!#
�q"0>M�ÍV�Ѹ��.d���
.�'��RL��j+��ņ� �@&�ն�&k�����]����\+@)�DN'$���L�~��@NQ�u�igg�9�*F�z5��B<Ѫh�R�G�Ѭa�ii�� ��������K�'
��u��A��E(�D�k�T�0U�O�`�D$�-��B�˅������y��4U+n�
�~h�
�УV{NH���ji_I��h�O�ʊ!����J���ԭ���z�Dbݲ�n+B@z��y��ԭ���*+@&�+|ەo�����t>�1�ٮ�����J�n��{���
�d߫W_�-`F؆����,�`,f�MĬ|����r�f������܄��ʨ�F���ʥ}sP���g��W��4W�)W[Ek��Hq�a��6a��*��K�^Xu{�����O�=F`j�}^Z��<tC�\��[���17�xiB(�Y�������LN_�/��L]w��i�(�H�/��
w��/nL�!�p�A�u�+ni�e�r�u�s�r��=o? �����5ӻ�[[���dt2Y!���G]�7q�!H���j�X��*C�w�b�6���!�Y�ōI�Q0��؎�GU�6�`���x������ǏY�����eo�t�2\)�(^�O&�K��4\)eH�o �\l^M	i����mī�b���(ֆ�/��Dq�G�NY*��5JB�R����[S�Ԇ�7�s0�͸b1$ob
!:�b�u!F�O��v����ÌbC^PJ#��aY��S1b�D`�b�G956#�s;P6��Aၠ�B;�@j������6���G����Ei/�������"h�Sԯ&-��!�dE��E��2��#RS\!]a�~&��=@��n��yy�� ��`!��`=�>CJZ
��[�B\�L�0 ����An�0V/�1/��������7��+�%~5J1*6,��N��J��f���o3{(z�<)�&� �����j0�صo{�)�ַ��V�)k�� �"����h�TW;3���]����%�9-�ǘU�$��@��}56?r)*��䍸�'�$�x
�f��x�H㾒���sR��u�pa�@�c��m%�f��|��[�
��\���}H_��/H��(y�2ψ��o��W8E�'f�/�ؑ�|�n�A@��G���`���zB��8�!�g�ɛ�F^��B������O��!��xSE{M�QV?�"��}	;]F�?���f
��o��H��w��w�{v���W]VTخ�G>uS산��N�T=��kl��k�2b��^�N��-�c�zl(�2��~R�I�2����W�ܘ�d�Է��oR7���H���aَ�i�[���u���O�;!�WGi$�e�<	m���q6�ą�#y����0ֺ#��W����&N�-y7EҎ�R#Inq -�v)onkW���<�BX�X�:�����    ��.�D^)C滩���h��bJ�rN�X	W9Ky�Q pHHi�<��c�e	H^���:E#���Q��y�Q8'��Z=d.B�����H�۷_���2�6�SH���XK,�CO�����J��A���-�RH��J�6B��=1$o�}�X��4q����vx��B�W��L�~7U�7HԆ�ɸH�+���2k�@����(ݓ'�w���,�&�$�۞�!%��=�XĨ�r��q�<��yR�ٓ�z�|#�!��;{˞J�<�!�aM˨=��i��ێ�u�!�͟@R��+%d���RZp�$�-ЕxER�̋��q8�Z�?$ŐƱ�L��kE�v	`YU��ފV�����Z�)�^�	�h�������Q�@���K��{�0��|� ��5��� Cv߸A�V��}����j�5W�G��B�ᐶ�H� �^D�g��k^V!�#�2����ǌ�t�� � Inq�@��PH�b�+ ���`�|,�L,a��/S���UŌJ���j��g�zQ��:���4�>ߌt��Mus�0Sf���P�duE4<IeFY%U�j��")a��M��nnr��Cr��0�"��v�H����DM�j���O P췕�b���"���<NS���'�:!D�Ǳ
�����s9_p��g5x�'�AT�b�x$�y����q��N�b�q�)�z�\U���J���i��z���;��K�!��Z���e�S���jU����x�MZC�:�&�˼F�f��w�5_�n��`�pH{��� �Re�Z8vA̍X�(3Z�玤����{30����c[����(־B٦Q�k;| ��.�� ��T(iq]V�����q^�yX� �c�r9e�
wU?\�v��������:Uo"VF� ҵ��+	~�����Q���O`�<�� e�H\��D�&5��Z���7Dф��H)c7�j(�7*��n��v����rG����0hҵ��������c�/�Bj@)��;{��#"��V�Y�F�M�Y�	 V��C��G�J
'�ʶfo$�@ZZS������7X	3�wÙt(��5� d��!�4�Uw� S�: <�YϚ��+���Vk���>�rL�+f�5YY/)�V0j<w�-Z�m�ǐy鷇)�剼b<�)��g�z��� ٽ�
1obu[�)d���������ڬ~�
i ��S�:�^m#�X�!c��R���b� <��\�`��bF]�M���l�4>GJ�~ۑb�>*=��N��_G�Gm47zŌ�:i��IS�r�5̘+�w�
��  y?q��ġ'�unjN�m%�(Y鉴L�9 �5����:��u������'Ҋ<�� <jGT#��+ #�
	-���"� �׽}7�^W���;� ��TH��"'���^�^E�j^�6E�����8|=������dW��KE�|�M�U����G� A��X�dY����WI"5��Dj��W�V�L�X	g7����To����tb��cՉ�����85\[����h[~�F�{�����"?@������������0n+�@wy��Fp�E�g��U�����a��EB����u^��Z<7�s)����Ȕ�D��r��D�j�5+�k�t|�J=�����a�����lBm^F�d̏&-��@�7#9�QU��j�����F-���}�����:���1�=����Y��=�TUu_�;�����&Inu�X	��f�v��'ߕ_h5!�l�D�0���k�� 6o��^!���0*GNȸ��dԝ��=��b�f�o" ���b1��]A��h���X�aƓ��#����_�Z�kM�6Vkv�p'X	��pl뒽X�QEo�vlk��3r4�H��G����l���@���w����	�r_�MӬ~� ��c�����g�0��}"�����.�c�������em�R��P,0�ܒ+nZ���j�:��D\	툎u�/GbB�bŌRֺQA����a�\�u�q=��
 ���J;>`6zD�[x"�uZ���7��-�	�˨�gSyꄾ�'�	wN*��o�|[=�Ղ/��<Q�S�z���Q]Y�_�Őz�G�)F���_��-�@\�YZ����~�2K��D>	��d�p�pn�@�����\�^��u=M���i�T+&j�jmn-��Ŝ���}I��Ms��4�#0���W����G:���OsG�\�,�s[
��Td�UȆVd�M�=q�Q��[���֖���Ȉ����"w��/w�Ċ�~��FV��&�c�A�[��yr�`H�q�1.e�-2��X!~���=�_�-�a|��j��V�Ze}��Vhs���V�s"	-�6 cmM��	�1�����Y84/D����2d���м5h�oLt�m%�I"*�sE�eZ����V���N���Є��|۫E{�q�OI�OD}�~� }�OU��Mh~��kW���խ�"��OZ����Sϗw���!��Oa�@(�t[	i�N� �!K'��Ԋ���7�5a��^4/����f��'�:���&#�A�fW��= ���0�ە�zP����-�3|YG�#Hߍk�N���v��ܞ�`}7���1M�,	�֣���R���$�ۉʓ�c�2��h[P��7N	�6K �A�k��ڬ	�[���\�̏n��{*��C0�����-�B�ݑH�0�� roWR���bR��e#���� ��n���ت]b�j�>
�X% �<�:2�pXɧ�N�#���%&�ܡG!�QЀPN��h[�yk5Hz��bN�V=��p;_���!�5l��*0�'m���MM��yZє9Dy]G�"�Z�@Q�B�Z�s�R�ˋ� �����:�m����1�V�P�B��Q�Y_C�
)�
�/5[�/��<��q���7�M�2ݶ����|YeF��֡�s�V@zZ��yll�V��r�s��t[��6�i�.g��p9{ݲ,��]B/	��Gť�/�E��)P y9�/H�S�+�R��j����Dyuҽ�Q���Y�x�(��{f CJ\���X��='�B|���=�U i��tA,M�u�1�2R9����غ3@��/���*JoŦ6�>�G�1��?JeO�l��+PH�*'�ұ��+P e��yA��x��*������4{3�K`��n��_��~�����d��37z%�5�A�'d�N�Z�L�<�n�@a�p�V�w�#N�U#��:����𿙆q��7�x�'k����A�'"���DR�܋Sܹ�{O$�!���T*�dK[���5I��'r��%����x"b�\1��CN9H#:���+��%�X�x>�/!s�јxE�(S\�y��n��I%�N�hW|"`b
b/˺�B���5@o��3��U��˅k�U�վZdI��n��!��e0�	ң�N1��.����=�Vn����jm��D15Ъ��C�n�� ���V.�P3�G�H���~�����gH9�L|�����dH�e3�dڣM%��5Ryb�{��Ȧ>�k�Q"�o&���y=y�(D���e?��N�t_�PgHO�:��˔�m�$������ �Rcɿ��)!9owTn!m^LO��/�ͷsAtO|Y��O�4_�{����^^/�����"�ݪ,a����iɼD���bHZ{M$Y���}ieH9w��ύX	$/-�.��n��U�����X��Rw[F �l����RF\�C���#O�������u=��å������n������z[G.jswwpCJ���`(�(��5 �N��N�#剴�G��J*���J�Hk�'���4>�uO\�*��!R<��Y-N��"��A�AS|+ ��Ʊ\�'n$����M���>�^H��O*�@�K�>�k�6��R;�$/���*�qwd�	����x
�#��J%I�����x�B(��H6`'ߥʹ�y�T[�g֕�Z����@��|w�U�K^��מ���i���T�	$ss��z��W]���q�ƫ���J���u�-֎����� ���IS}�$�z���j����Y;j    (n�8������ kZ����^�� ���^�
�~�
5�TրUW+@���ވ~<��#D��XA��a����hՋ�2���)��zS�[���r:���h���Ve	��|[Ii���n7A@F�p���MJ���͡0��M�m�%��-���V�28�>���A�jp��z�D��ʷ�u��b��F����uVIٛk��ҋ���I��>Wu	�IZc�x����`O�4m�� �|����0��?S����O�;~��'��I�?�F�-(����ɂ�9iWZ�ʮI�I��r�Ǹ��A�C�fN�ܭ�AM!-�,iAM���uU[�h���-quM��~K!�-D��r'���;��)W���aetu�ك�Z64���8�q��'�{��i����P�/�ywU, h��(6�\��{����6��Y�J��q��@�X��SxL{��"@��il���G��w�%K�/E�����10!��h]!p��{^q�@F	���0�ʩ������"�]	�Mk1S����8�����ڭ��"q�Jm{�|鲛�[�U0���5I<��,�����,��s�e� &c��oz̽z=����|������h�E�5?&Mu���K��Eà)ǫ�$� ��h#��"������-��o
V��Z�'!["f���Z`�����HS}�Y����g�Rw��%�!h��NHUq�V�sMg�4W�0ke/�ʈ����"�&��ߠ0�vz)d��n9C�w@r�$�um1$n^)�XjۈN��0x�́���ԟ�9G�u`<a��S 9�������N:<V�$��j�ę-��j8�E�A�	��.�T�i�����<|��y�Hk�l���bF	��@�kY��1u��0h�َ���*h^� 3j��\6��uP�|3Q-�\��&#qͰ�#V�;������oҬ��d	��j�(�i v�.�*�`ۏ�Q=������=BYm��#�ㇷP����4[@���b��rBl�����.���g��S�l�?CМK6��U��PY�>����#��f���b�[����c=A�:����B��+�7��N-ZFqM~`S�0m�XG�˖hTw:�A�[����0��hK��b�st�+�~1�;�	�9����	�j!������;?��� �ie�3�`#s���j��rG�u��
FY�;�N��QH�P�W{��c��5$�BX��(�����b���Y����Z�!T���@p�%�-�cj�y8J|�p&\,�<�, O���4�n��y<�^��^QE�F�"j9�����~���^ÓOL(9�!-E>����w������-Xr���\��@F�7ưo͍g1YI�t	d^�B����B�eE���h�����̚_ �bɹH	��+��B4��r.R��2��M��,��� �����Ir��*c|UG[�1�%��Wš�a�mu2��1�h��l���SpE���G!�N���@�Q���c\̝�%��xx/�M;^�x8��ov;�	�vdF&zy2�A�����^P`�<L��V`4��+��@%��jp!(�=�X��m�x�U�L�aݑj�MQA͉�Qsxu�&�/��)w�2�����\!�?�eP	#Э����j�:RjD����<=���M��K�����bc�j�,AhI�^��%�F��$�X��J)
�z�'�	"�^�
��4�`�/K
n������$�X���T���/��x'��-碌�t�X�uC�����Չ��v�i#��s��1tӥҧ�.]������F�6E��ڭ�"�ȧ�.D+�I��Û�FF7��!2ܯ�,͹[+#�:�,�	�W�ʐ�/�A�KƜVf����0� ��p<�@�y:��!����$��
d�㽴��vcU�Ўy mݏ�.��)X5D����TIC}Xxy�Я(_G~CH�D��EM*�G.KΊ����6V�������Y"f��!�7��\_^�j��"m���	
'T���*D2�� ����ϯU�`Sޠ�s^V��%0-�4�[�������2�:8˛#�ݚ�Iv^Lk��Sm�\�)K��R�)�?Va����B4�H'��A�Dn���t���b���O j�7D;r"�+�0��v��h.�xƨ@�-��ڊ	q�U���r�@�9be�7�ʘ���#�z���z�(�}>
C�<JtLQf�eƹ똁���:R����{q�N5b�ƚ�^9Ǉ���T�G�n�4�RT}�c��+�Ɗ���8�(�E;y�rD��>
��k�p՛��`L�+��*�ˊ�z�$B��Ѓu�?[8�!���K*L㼄⫎EǦt�8&�2J�wD�W�|I���Q
�%�c�WM�
�ϟ'�F��UXu�+�!��%�z_y0k�5Y��H"f���_��n$�1����e^��uw�R	�N�Q��]�4x�nvlRa����d�C�]I�Y���F�y� � ��8%�`м	.�.CUqIͮ��dV�>;��J�ٹ���~,1�Պ��}Q�	�NL�+D�N��{�L�ݒ*a�M�2L̼�*f�<�����T_R��r[Eq�#���B�C��h�+��W��Q;�x�?36�L�]�T)c̸@H$ċ=	��v[G��D��PI#׫M������T���a*��RR��z��SU�� dRo����ͫ����w}Y	���eX���g���g�i��������gċ�6i1l��S�JGt�Bgt����???p���*	�5qrJY'$0�kD`n��")]�'�Z�����m�J�}Cpn����A����U�&�eQ��+_@Z��a8�OMI�:3$�%t< Yc��􄔑�mM�Š��ߌ2�W7
A�\2^�6���u����s�2��Ņo�����R2���8�|@_V��z ���۳5\���\�����է��7R�0M��T�a�D`�g�N<j������5�:a�ʳK�-� dt�e�U_l���nbKZ��������׌c~?z8U�*��m|���4�ͨ9�|���B��Y�x���U�P�<�Ҳ�3�K)��WUr�h�~,GL���jX�)��jء��T���U�F���v5ʖ���b�*
����Q���,���￵��8��?��
�ĩ�J�`�]�w-��MH_��찣l��y�C㎌k��f���vObyy� ���z�=��5�=�c�拋_ l,�ț[v��B��	q���r�^�a��b�A�u�f���Zm��?-Mk���8��W��	���H�.��h����UaZ�a[WaE��2'�ѵ`L�}�s��s�u/�
��-�U`�6gP�w	*#��"�Y<��!ӂ�7:��Թ�� i��^�ћ�3���uC\�KJ��fѺ��K�Cr1?�[��$�n7�8A0pdEް[�Ο~@p�H~߄��zS*����_�I���_5n�S��,M�Ez�gɫi�?������o���Q�	.�Wd�I���𢪲,c�����{9�/��O�z@�f����	c�3r!�=1jr� z��b�Q=f�:eh)���1�b�PKlۧ,�8��@�Ui7v�-C&����st��E�D��Ť�eQ!���2���ah�-�*h<�m�7Z+h�&��^dn��R�M:�o�}W>9ƒ�*�cɪ�@*��.�E+L�.�n��q�`Y�ۚ%Zh4��y�'&@�&@�B:w����kڠ��c�u^�xA4��7��%�-C-�Z�ւ�k{k}q�cΨ>���ŬI�١]<&⻨B/n]�"H�tW�bt�`�y�im}����e�� �n ���{?l��m�Mt`Hl�Y_�8��:W �:U�ԢN_N)]�+��� ��XJ����	�⟩����Ϧ~���b���/����RӋ)X/ָg�r)mZ0\�R�*@G�!�طUH������FɯB�R��M���a�yni}��'�~�n,��utӱ��:�忝y�jCg����qsrыn �N���W�*WxJ�n&�n@�>�/��h�Ѭ�Mf����<}�=�FJמ��    N��]!l��l\n��*��{Յ��8=n�PX�DBڮ��Hh����:�����w�rq���������ʧ�\���U����-�Z
�o�{,����`�Ѩ.c_�8�%J�|p�Ƒ����Կ�-�'2��?��Tm��x�:n�)�4A�K9Z�&(�I�%��etk!_�$�
�:�F�W~O����v�@��������c����:�o�̱,�&n@���j�w�L����w��t\�vG�J{��=��0zym�%�i����ס��{4~����멗+7�Ō)�uy�@FE}��Z$��Yz1�Q�dx��G4CY�9;�K�U�9!� |��7��uC��!v}��bUƒ��@����Ư"�oYtU�̿�),�7����\��/��qc�ǯ��e)��7ݐ�Kj�*�M@����cuR����z�b
�5�벮��/������kM�� 2�xt���g�N&�k�+���r2.���nX�s�`[�}�v��:z5G�..�; �������:_I(-�+IA�t���,0�Z/qC$Ζ�q벘����Id��H�z�4)7At�3ԃ�Y�?4�F	�;	�E�;�r���ce���K�1r�;��Ҭ���g�&,�,���-|�����B��6���'����暫��Vhg�=B|��h�AT��0�`~<7��i�\/�B�Z0;!��v�'D*�����j��ۇW���s�ւ(�L\C�lw���Q����=� �Sv+?�TM�}�	?-���H�G�Uq7z��ݳXᔘ���b�D&i�4���Vh#����B�>��kXd�MMk�A75=>�p����� ���/�W�t���
�Sd���VO��֓0��$�� �o7�ۙ�憶 ������\��.�q����k�`V�p��	�зJj���7��k1$��9�x���V_�ӯ+|
iS�	q�.�P�RQߵn�e��,f��Z|Y�HM^8�s�`^��Z'����pV��7�@p盨WX� X�ˣ�tB���1��1����P���"��I�\D�j\Rp���6�0�5���+ ��|�d����& cj闚�b��"<��=�Q�?��dg� ��c�Rɴ���K?��ΰ%�c�3�29��s����j�b�b�)ɍg	�/v��j��ʠp[G�Ļ��s1)�uXG�	����9�
Ak�;D5:~0���*~�a�S<����ʒcKi	2��u�v���*��J�f�n
"����<ʼ&:/m?�.�`�ix�.�{�)©; �Bz]pA<O6��D��ݨ�6N��:B�$����X�C��J�PwD�~�� NH �ǎ�Є�M�U�@��A8a����A<Ϋd��勝&��f@�}
z�g������"Y�"[�:jD�嶮�}�Eʠy�'``�������o�1���TO�,��� I?!"�
�����~��������¿�W�as7Z:�.]�7H_�6�1m�ٍI�۷�m ����E�Ѩjɍk1�O�ͻǤ�G
�� l������1��\ߵ3���z�ϣ%��)(a4SP��6F�rct�]O�'fm���14v�>w<�w{)9���2�}?���Ż[1c���{!�S;��v|p��v��TNɷzD�����l���>�|1(��,][s鳐k >)��x�D�NbAt;�ɵ���D�= ����������!T�����ن���l�DNC, Z��x����J�5�e�!\.�k���b�Ȕ�"sF��W���� �޷C�#���� 2?�\񞈈U�",�����W����G$���UR2��E���0�Z�2:P_ͷ~C�y�R��MJ�~ڟ��1݁V�&���P�G��.���V�m+���x,��7��>F��c�)Zt��J�?;����Ujz�薽5$��kHH�xbj��ή8�!��S�F�K����	B����Qs�]_ I_h�i��惮R�l.���?��?��`�
dF���qu�uW�*$������)3rˁ"Lo�m��?�f:7��&�[z�*FR]n/^50pq
ڊ�6A�Z�>�9�	Iڱ{B�C^�"�n�r*��"r�}9H{�W;�ARxQO�[qe�����L�'��vc��>\Iued�g��n��1ϐ�Z�D�4<�T��0)��m<�ղ��Q���9��^�/�^�?��V�|C��M��n�Do��.�9ňe������\�� 1�}V���	E��7�U�����h���x�KQ�qCDM��n$JoV�U<�N$^�A�Q��8� Jy��4��=@�t�D$=csx"�P�ob�g���"��E��p�P��t#Y��e��� �zuT�Ni��z��0n��M�����8�AI'�����t�p��V`�����YՈ\���;sSݙ�#�lo�ӂ�9=��Fw��솞��l�%Xd7�$�7Z���J�N������� }n����|�ǶWr���Ѽȭl�S� �<·�|A��h�E��~P@��a���^��� A���a8�%*�%��n+�v�^a��4�5:����H�\F,�:0�Z$5��Zx@�*!����P��l�?k�j��ۡ����m%]ͷ�&����m%�C���UOiκ��֜��ᆘ�@*�D�:2g=�z�|����*�Z��	�������g'�j�]	��%<�$l��<�;9;�7K�m`S�d�t^����$R�5^�?��^�Dm3��D�W�u��m�9G���a�9��B�i���yZ�>�Q�t�Q(o���9��N1���s%)���(������9��B4*�؏Ǥ�����X��b՜/�e�&��i�GK����xv�K����ϱ#$�^�I7��f����,SD��������d���Hc2�+�"�S��뵩ᥗth�4-O��a&_��Xi��*�LU�����!���]s�r�CL�w���"�=�CL9I�\��b�N?�ܓ�#�dO�ӄ�4?�2�]#�懘R��8�[O���:P}��DJ'	�V6��򾙁N�q5��6��\}i|>m^�a�n��Ni�K#�՗����[xbX-�|7՗��m-�b����2J�C��e� 3(�و� ����+A�5�@��7�
��BU��M���C����h���b�udFA��@�V����-O�mdu_���'�㹎i�D��'rʓ���hfX>�;��E"�C�����G?3��;Bo��թ�.L�e�Hu!zH���q'8各7D|� ̋��A�-<mqbmo�\����=���0��^wēT0��~ Л@����l�}�q,���䔧}�x �u�gnw�[�-##����"�ݡP�PbXw#�Y�9��jSf��
�M�<XG%�����>ܓՉ�RY�!��"(�-%���Pr��^}�;��MQ.���.E�̠�
hA��z��D�6��7��pe	7I��po�5P��%�\ҷ�ݠ�@ô~ �a� \��xC�
��hA���o��	,Y ���Q��"��j����Q��FU�A�Fq���1��i�Y��ȣ��bH_��>X�+�QV�VJ�Ȧ�L��]r/��d]�$_��Kiǜ�n��%�R�F�#�"ֵ+��y�|LjLK���5�ߴ�
.��w�?�<1���NE�8�}%�Yey��%��Dk$R�{}bH��T�}9E��CN���UN�+����mhS^[�/��{��c�D>:��	ͨӺ#9h�Hҕ�>�8���o��I*q�]��DT�'�������k�3�G��ū�a(0RY]��H�FJ��u�)��x)����h�_I����@�d��ʀ`�^���������ں�f��|I��NH�
lZ!�*�uG��J1"*a�����̅�<rVu��~��E�7D��
�d�멯t�<����5P@��H�)t��~ܖ�U����ãk�� ا��f����2J����Z��B(��p���l�Se���@���(N
�:���
aw4��E��r*�%>!h3c�	B	���� ]  H瀩���U!S��$�T�	�~��H4\�/�!��}� ߻�)�������A�[��y�.R>��D��Đa���{�> ��a_WOC���*�Ynq{+[��(���ζB�VaK4���W}aL��׏��=z��޸����	���l�`�y�"���>�UY*j��r�]���E�B(.��=%�^t�t3+V&��fo�el��h&d�#��U�"�����K/2�)��}H�0����u�/WB��v}�c<�@�����!�����]�^��\��>�W%�N�vA\�
�UZF�0�H�ø�ʖ���J��`�g�	J)�b�C�B[ ՓUf���ƷH�DqBR�`k�X_��NuBR�@#^E\�h�R=Y�*���zU�y�(8�㶩EoUEߧR���ɖ�u4�������q�Ԧ�����B��AD\��z�*3RX�*E$�:)0�pg�f䮛��uR�e�2���7���e7�@�z��1UHYތ��	]������\��5�����}0�1Fl�D;u��� F����0s�y��ʶ��ov�^R;�9�?3OE�<�D���H���:R]�#��5�|G$>�"��TA�Ԗ-�����J���n�LR,��K��P�B樺�Q��P)�؈�Q�����:�j��'�����y���O��;~����kpB���@�;�'O�
��!d���K/C�Pv�d}NO�
�-'�iv��e��?���~�/�i��b�#/���>�2N�J�u5ֻ
�/1��!�p�\f����<�m��#����2Ƣ�/ĥ��GiG/fPd��0H�FU��ރ������0M?�U�������� ]VM�      ,   �  x��V�n�8}�|���q=�{�Id�.�Iڧ�f2j}[[3m���(��� ��E�<b�x͇W�o�4�J���_�	���F�\�������R{�(�'>JF�R+B���UWV��5��?^�gQ�/-m[.*c�M_w����kKm�Ɂ�[��VZ�kz޾zW ��G+F�K#W$����_ݓw׍&��nh�ˮ�CW�0�_����]���m��9
�N�It���\h�T�@�`dM_��.^�%hJ��B︾�U��Mǝ�'Å���;��[I��b��v���Z�E��ᢪP��W**�峭[����UU4���I`�]�q��q��	��4g�'�VBC1�T(�q!p��G���w?��̇���(^N�*]5�sn���J �Ka�|�v~�؎�Aݚ8�ۓ���C�r��_�ƌ�#v��J��]Z�VM
:�%�E���:��ӓ:=��芣�}8Ե���T{ e���g4.��銳$a*5�4h# 7�_2M�I�����oޗ�P�	4@i���uq$��6'd�l��P�8b�޶�N�`�HZ\�������n4�����L@)te��-�p�e���Rv9@%��wg�J
%��t�(L�E���c�ܩ\CS��*t�e�r�Z��Z��5���*��,�^i���n��p��+����1K�s�|����	��?顢X2��+�t�]�Мq>?j�=xw�M�+2��g�Q���Y���V�����.�����>gwC�ʓ��(|��:���]ֱV�/���v͇V�/ؾWPʙ.�F1��3M�F�c7�q��8��4B�wNxyx��,'���XE��4��;pa�H~�F�BJh+��>�e�^n�wJx��jV��ͭ����`�m������C;���w�o�H���[���O����^c�m����3c��R4jj��'��#�`���E�-3��p�kx;SCl^
U�{���I�d(�#�=�w����<絒�,桅#䱁+���JE��p�F�[9�3󋺞'^d�雮+���;dP?㫉C�SQю��p�� ��yg�1���s�W���Tk��&I4;�M m�d ٽ1!ߦ�T���a?:@)���ҹ_M��W����|Tw�x�|Y�8���F�:����N�y�0��~��w�O�b�w�C3?��=���`A ������6��щ-ߺ<���g�G	�C�{��6�o?��~��w�A�Goe�f��K�Lo�1�'Q�z��9;TN����l~v�      -   �
  x�EXI�$'\g�/B�]|�s8���;~�Є&��}�/ד��ePO=�`\���n�o���W��$ҷ����"
�M�_ǋ�!��(��!8	M ����Eh���LG5��c<�}��&�Y�0@v����$ԱHB�S[��i/�h�K(����LA0j�y�0	6�K��. ����|6� 8p	x�N�M�&�I���o�9���N��&��a�I���/)���%%O���/�рܰ�c�n
&!���}/�+�j�m�H���_�㯰 |�×��mQô4t�WX�Ϡ�v{К���N�Z�I,�..� 	7���!�� 4��W}Vt0 e��r�mB�b�8\�N�ÛR�\"��9�����,~��� ���C?�|��b
��o��l��MDf�M��(����J	�"[j�+�e����a�D�)"�X���8a�����􃳥���,��Q4�v P�fx�&�-�6����-���b7S�r�=�,e�!O�sȔ~�r�eG�"ߤ�)��׵2#�m�>v�eq𵽄���b����|�1B�]0��t��ݿnB3:�&��bT�PGP�Z�#(p/�3;a�������V�"��9ːa�\[	{��%d)�2咵��>+�UOF*�UQF*�USF:JT#�ue�����YI�K/հqJ�)��(�*-U�E�d��� W�g|�I9�D)}��.BjQ��������.F�)��&�S���0��"�����
x��%dra*A �j�av�l	V���Xр���1[R��� V@o�T�ǖL�~	U�ǑTev��t�0��y���;�E(�8=_���3\7_�����i�E��ۜ�8�Lɳ9!�6'$���؄� �0%�&L�Ryh\�%��-��Z-�}	Sp��(�30�Dɜ��&<�4�W�M�+q2a\	�	��؄W�m�+�6�w����M@u�tP]<4 &��Fy���(+��e%�z�����(�d+[bleK���(�����[�3J̥�(q��QN`�j�oG{��.�tb�M:�3�N��*��3�.����x;�^1s���g����ĸ��ԛP-�$�tjV�0�&�d6|	}��@���p��P�u�+��u�+��PO�Cv1��ua���h��{2�ZIL"��D�Yn�z�CMT��;YjZ_T����,-G,p�3���>'�?CHk�k^=wϩ��d�Ymn�lH�A���+8��+O8��`3��)�c�1��%X��ٸ�򼗸��u'.�",��$oH��=������w�m�e�F�(m�y?�}�y�ψ�u�u�5?�P��(�僉�/L�r']�N&�s8��rO�5>!��!|X��z�#�g����u����A��grTt�M�N��q��gr`�l���eg�ζ�r�$�n>���̒HU�Y���1K�����,Y��A
���f�ɑ�D|y���5�M�]k�����܊R�C3-w��^Z�Z��ܵ&:iu�G#��Z�H�m?bۏ��v�Hy���$n������l��G5��Q�~T=Y���h=PKk�}\	�WR�+1�J�
)��]ҏ�i�
wnV�/�bU���B}8��NCGlVnl�X���JG�"�6[a��Tl+OQBj��M�DA%+W���=Q��O�D%+?}����I���'Q��0���O�L����<���@�MJ��oI�w"�b�ȡr�L.F�y�55jE��'�z��s���r)_�:�&ϭ���2Z�)�/����t��{,N��y�=b�����1O�}�<9�)��ا̓c�2ON�R�П���m�#$s�є�7�d��w	%���B�L�d��$�H����D�.SR=���ǻ[�,����+�d)���"r��'xm�s�;�M������ "g��2��A�M��C\��4?}!E,���A�r��˚��M���@�ӧ��ꂴZ�C�0m7�K�
n���}=:���.��5D����q�Y���иg�o3;�o�;V�A�~���4�v��d����Ɲ�쭸��c���s|;��6�+�5�[ѭ��RY�IZ�>�hj��,^��܄��4�6	/��`�[��hB��%���H���<uW|A�+Ȫ�$0��2fxBp�ӈ�J45#�>	�95%8��U���h���ɲRZ����+�n�q5iy��y��h�n��p���盭7�����P�7��m�Vg����l�+���5���Z�-Fך_]�t��Cۤ��k������>u��w\��zC���ar<�F쯰,�n��b5��`lx�Qv����b�jڳ�ar��⸎�Wԑ�mx��X����X�Z�Ts`����`��TO��f�Z��,@�H���^���jk�5�$��?5�BoS,BS��_Q�y�bJ"��~��������^4��%kD���X8��)Bc�V���q�ߨ�hT\�<����%�_��47X�Q��c�/͋�b?r�XH�N�4���k��������Zqj�9��0F�?�j^BϵZ����nF�jN7?��Z{\�_9+�qA��y(	�k��G+�=�@:]�
�t�B����܌Lo���RʭFh�Ν<hx�@�e��.���иѽN�\�D�<|{��|/+����AWC���#D5s�N+�7�Yd�o���}�)�6���z�!Қ���3}��B|p�o��CӮI�.nr-Rk������,N����xKe�(�v	
����^�����+^��M���#�����~�L��      0   m  x����n�H�������ڼ��MҴf:#�Hs��@u�Q����T��lL�Db����~A����2��{�S�$�?x��*]��}7�e��{�T�N���j�&��"K��#���Q�Ҿ��~�	KH�� �H��d��ыa�FY3W�Eû��`���?���;��^��b�oJ��l�fm�{j��X�LU2�J/�Q��FbLh��X{n�g>.�4�6�Y��ac����ۨ���"����E��R.�0�&��	�� �{�E�F���|Q=)�HsY�E���J�&yQ���i�	@joƉ�'��(�~���*8��5���T���5n��֙#��ʲT�.i> �\n����U^��R�j��>c�ĥ	�j������Y����M枍̠�2J|[��Yݬ:�I�F㝇v��WY��߃x5���`ef-�ʤ�U7�V�.�Lio)��קE0��#Ԣ�)��
8z�2Y_إ,j	c�p㻃�7��K[R�-ɠ�ďCK�j:lI�����B
�Q0&Q8�t�ۓ��S��b�u�8J-��^���b#�=�-�i,ǩ��^� ?�%��70V���zi	oa�{X;�ht�$���ۧ8I���v���*�0��W�U����B�.���dW��ǭN���U�����jZM��&f%�'����숉���� �X�W�kU�_�\"W4��7�ò�V� ������AL�u�X�-8VwpGL��VY�G��S���J��:D��Ǆ���������^+C6R8�zOq�D7��/�"��KӓwAЄpgѭi䚛.@b(��Mײ�v�A�JmsU�_�o�	�A,ϩ��S�	؈:x�Q�3���8|�Z��ꠣ0�J�i�׮��]ذA��b�O0�X;6�A`ϦEݴVn�f�%��&K����UY�4?w�D���pA��c�I/�����#		^= ��<�N�6vKQ/��A������q����D0�Q� f�ֺ�qW�R�c�4Q��=�M\!���"aԍ��	Xx���0��������a�q��0���[La��v|��	�'�:�`�ְ��s���s�B������AZI��M4��54���K���@(13      2   9   x�3�46!#KNCN#N3.ct!C.S4!Ss.3 �$0�q���1����� ���      4   N   x�3�tv��4�2�t�pu2�9�\�B�NO߀` Ô��H�q:9�y+�9���E�9�C<\�@jb���� h�n      6   �   x�M���0E�ׯ�4�`m�Z"DLX���1X�^�LNrs�r4��uQ����m��9{�m�����KP;�J�q�$��E�h����i.-Eg(��|���P��:��~���Y��)�!~����=��Z�@o�4��!��sP�	�H���!��G.      7   {   x�E��C1CϢ����ozI�uD�|�ɏ��p4�-l\��ME�6��#��Xݍĺ�mI~K��Ӕ1�S<��:�e6�,^�:Y����*\���Y�ҫ
���p�w��5E��~��9�+7      :   )   x�3�4�4b.S8DsY�`H̄�6������ �zt      <   =   x�3�t��-(-I-�4�2�tK,� 2��8}�L������)�{Qb^�T�W� ^�=      >      x��}]�۶���+�4ur�&%~��-;�w��r;93U�Y��E�Pd�m��Yk��D���*-Zk�"�����{sS��IU�������;լ;��ڟ��5`�7�����Jծ|~[4j��Q��\����R��~<X˔��K(�"e���:=���W�2�P�:�Ul1*U��k.G�dNz[趭kp�G���.҆�UfQ��^=�B���̅��"�m��N�I��1oW��
QW��V��Ǖgi��:���z��T��ܜT�U��gi?�nQ���P�G��R����mqm	�U =wW��*�F�sX�pW��I�XN�����Y1���U����b����[��[Eq�5U]��#u�W�U��[\�[�7Z�|�FZw8�J�_����]���AQ�}��,�?�{uD�A�f����Ty��C��:�f�[���T�Q�}K�+Jݵ�#ng�[r��ў���{\k�[b���,���J�AC'K�РxW���UA�|�G-�qG���}����xb-��:O�;��S�ձ`ͬȮ��F��}J�y~�X���*���O�]+)J���N�zX�0��}�W�k�ȿ�I��=�7�ri�JZŕ��Xh����*HD��:��,� ��l�x�yɛUkn^gm� �*D����E?|�B����4���<�*��qJT]������Ȇ��8��x�
����^���U޼�_���M�3�IÓ���Y���s�Wa�_�-uA�pڡF��֟U����Wa��ݎ���~���`m���qF=k�*��[VG�1��N��((z]����Ƿ�&W?���b��]��r�֥:�j��
׎,�>���h�C�@7k�ax����UM��+����;U�o�^E�+ԈF[uАme#����*p-��`f���'���L�8lY�-b�/勔�*d����z(��;�	� ��xV}b׿�k܃A.�j�c[��+�Cgz���Y����Jj�C��\�����뷬�
�!T�
G�;j��B
�V�*��9�`�7pL֟�_<og�Y�t����d3|�^�Z|��p�x=�e?N�)R&��k��J����С�+:��=\��������6o8Z%� �I���?>��nZ%��z[�_:��d���ΚF�$�}�͋�<����g��JMna<�[�h�b����
�D�� wJ�x�[iE?�1��t��N�iu͹pY��ǫt�D��E�B�wM>v�!�7g2�SVҳ�_�t��:hW'֥�,�B3J�W(y��m\��2�-� (ی,tz�����RK2o5�*����]]��m�8������W�*���;�=��R�B<�ь����A��ႏ�I� �}��#[���Nî��A�{�i
��������򌂀_>�r/����Eo���ij�\�qu���|��l,7ͽ1� �`��;�6�^�ay�M4���T�ϊ��5�D7V��x��on
�L��m�UeMR���I��̅���b�jz�oI�c�<oJ����s���9��T�ʭz��D�i҂Wi����wu�i,�>"p)������wͷ����ݜ4Kɛ�`��pW�ْw�0����:Wd���������<�D�$}��|o�T��[�}7NK����%B�ē��p�!��Gn�����e|��NI�{�P���,�t�h��L�{���A]<8P24 �*�௠�B�Aw}�3ٴǼ�˂,���j}/��WR���OuӢ%w��S`-�*��|�M!\���E�=�`��pgGn��	�؉�?�WO�Dpp�{A=�h:r�T��j
 ژ~Ϛ�'7��͵YF�<��m�����M�H��?����R� T�kVJ�3�hR4�޲>tm,v`�p=s?e.�ZPc*���y��+���KĊ����`$�_��W"��6���
f�M}�p�r�Ȇ*x����A0pS0��8�r<y_�ںBڂ�:�[�$H�����ؘ��0p��<�#�Ԙ&�H���`�Ѕ:��B@0��r����x`�hU�_|Y���g �x��x����\|��V��`]��%��/���4�d���\�q@�2??��$�2�������?�KXnx�?�����ȁ�G�c^��#��t�P�̕9�� 8u�R�E.�d����~�Y i����$��'�."~P��^8,�+�R�Ʒ����ħL/�}���W�3/�z�Ɯx����EM��!�����E�;�GoA�uE�mf�w��.��K��-��B��*���E�O��,��_/��f��³�'1�Yh�(�c�v�]�A8҇0�|�ie>׈:8p�����E��,q�rC��@k��/�#@/*�k0�(��+��!4��n<�X���T{�6	Y����򋡍��h<�?��H�]q��>�Pey��Bڮ����{�� RP!0����W͋=K~�X�������/ x�{�ۇ�?�����F��Ж�K��3�ר�<�	�XdaRw��##������C%#�P���?�=޻��rɋNwJ��K��G\��\AM�c@�F�.��q M�֛Vj�Q��:�O� Bנl��J_6F$��_��?-To�����#7A��|?v��ٰ)fŇG�^����v����h��v2�P�![�����{��qx�Qx��{�N�s4�sp�-�]W�M3m�_|�Q `JhS���rϝL��)�9�9~��Ƈ[��#�ߓ��O9u�H�Թ�c��KǛ���_I_!�`eˬ�~����p��4��A������s4"�'<�
�!�å�_�*lXW�^�	�A_���"����ή�����@h�?c�mp���l���on�EŹ`?���[��-���Tf�(8�y��=O�!�2ߡ���<�fG�G�����3�rd���+�ё����lY�9[��F�S�hd��D���{���1��h�&�G���D>Bdm(�N2�7�z�#x���~��w���F�������</�o�a�ش��n��� ۄh₼/�� _a��W�*�)��8~�8[�WC咞H�:�� �gN�,~�q��oE��s��3����w��M$����$t�f��GB�&�L�hiF�v�;v��r�I�@8��ײ�����t�X�̉m9�"_��f�����[B��(�<��ݡ���k?3c�3�LNP3���C�+�scZ�U7�.M�:Q�4�.�wz&5�{��[a&�4�{>,?�u��-SK�ͮK��ӧ:��g̼WX�ITX��Wi���;]��q�����8�?�ڣ�Іர9"�_�UR�Q�FĎ�ݨ9 �8q]xr:aDJt��&pF!*�<�D;NF}bτ��y�{Ig����n΋�(?�K��!o�`)��2I`��̼<(V�xG��*]��3�#v1�'�d��
6���ص��6�)Z>W�7�V����=�Bh���P�@�m
&0��_ ��0m�P?>BNo"�~Pf���ZqP��#4��c�|��^���q���p�� w�N��xb�5�r�l�:^�f�B*���:�ľ�H������:�9Bġ���k7�޵�FB0/yN~�7�G�U�:�CC��~�*-/[6���L�,���o5�K���� �w��)+&�\hU��� ���+w��~s��w���9qNq�] ��S��"\43.�� &�3�e}�]��z��4q�gm�P��(���f6d$o$߳mٻ�fB{�M�屷{��_*��k���a$��h�@�.*&^ah�lAh�ei#���8mix-�Ǘs�CTrj����	_ L`Q��^��h�>�>�sEAt��W�j��4����g�dT�C��Mѵv��l.mZ�M���+��ȉ� 
�9��b� :�������p쀛�>v-�� ѐ�ڈ�,�Qԡ/C.�ie`/@@�ÿ���ʲ{"�9 \����o��]I�>H�n�`���5*�i�\�h)�(�\<x�%���x~6�(ܝ�`�������    M�k��!["���*H63�0��>/��o#��P2��,X�~�%���ߎ��ItA8�u����9�[=�炑|��Z�ը�/fąU*���\���'E�}�Q� ImPn���kɨ�ܳ�Ym�5?���K�H7*�թ%�}�T�t��+��� �a������cK����3K��s����t���MC6�+R��G.�{�Xy�؅>�sMh��d�+en���9���u�/X M���#���Kn0'e��MI�,S�H�2	Wa
H�Mjdd��JxD1���Т�mWʰ�ȍ�_��+��&k%@X�&ɲ�}^�.R��~ˑAAf�j�R�V���T���f�yi0�3��pcK�3�KJ3�aƠ�k�?�Rf1%�ژ�pci{M���n,��Y��<3�0�X_��4;Y���p��7P(I�,�b�C�R}B�q�5�,��H�ء����56�QX�
a`��Sު��]+#`��*��`��I��sǅ:�h��;ܞL���Z&\�����5ey�3��*�w�3&ա��Z���r�g&�[��3���T�Ҿ'P�|KrY>�n<�L�x��]%�L�؀�>����o)+��f��Aqɀs� ���@�dŷD�El����S8dX��-#��ci;�t�:hXھ�M�p?D��[���$�
&��%�oLnb?ݞ�s��8�[���7���PX��K�K������ɑfb�z)����0�C.b�|o^���a`)�Q��
�<ah)L�Y]2�+���G���-����=��A������+y�d�����?n�6g��O8�|z���٘0���8��̓�-}h��3N&K�/J�s�3�OXZ�0�0��x�|F��_�C����冑���`?F��_�v��G��Yb�0��g�"KS�qO�v��T8�5u<����'�N�1,5��{���a����N�����p��ۺ�+[��K�����l(����ըM��<tlIkHf`�XS����>/d�\p�Vl����n_�2+K���6m�(����s�����G�l}GVI��
��{4�k�S�9X��-�H@�y��������%i���@��*-�U�q���k��p��p���H��1ǥ�04�]��I5<�ġl^���C؞�R�ԡ�~b��Y��L�(����~�C*KjI�Uild��^��{�%�5���1��%����qgD�Ԓ�����2sKx��R�O��z��<�%����>:��Ԓ��Up���LR�������>�p<\���=�[b1�1J�X��,pc()	����,$Mѓ��d��0�F F��@ �K%1��2,t��U�N��h�Ybq�@��U����Εu���!�TWq���Sy�zO�$@��@#���~*�ýW�'�ĉ��f��%_�K$m�E�e�6�6�,Y��#��-�.�`����2U�=*w-Yݻ�+��D^�@9�8�ySQ?��_a�J.���؉o��,�t��8	)���t�R?��7�ý[���7l[0q��Y"*�]]����ɟJ���6bDa?p�x0@S����*�\"?���XK��3�&	#�S��u�pp�r<U�sW�f�lL2���
��g#t)a0�q����p��O;��"^U�_�s�"kC:��И�<�᭙����e�ۙjw�u��w̢ q���LM��1]��G��� �\�N����KUl$&
=�~�t Q�`I��Ç���b0t�f��Q^N��7�L�<�fU�~�\�5�>���o�G&T����(D��}Qf�9z�^���LH<v�C���]Q�52�3T��Đ3B��k����s� �FD�J�@���Y�d���F�>�C��x��m!�I))L������=�	B��_��Uw���@<Z<BY�#�d���J�*���
43�#��n��������!��NVCH��!�p�����wRh���ۮmշ#��* Es�ӯ�����Pu�'sXV��du�6Zw{�%uyW�g92��h��Q�[f���ё;-x��%]��0��?G~W0J�9:����9��)�f@�jƜ[�>j��dT��k�:��NFU��t���<�Q�\03E���(bN���|�g�o��(�]A�|��V��S߆e:��4��er��	��E�H���6;�֔F6&���p��pw��J�f7�(Ml���9� �/�Y*T:��&^�������ls�_���N�%��z}�E��]7?��r}Tv%8so}�����O�C}�F��eU��hh�F���O���g�J���l��S��P"�P;����T�njC��l��
�Fi��8�#�`X(��Z�`�����L� l��g�0t����G�;c8�=័^l��^�w�e1���$z�~��Q���.�����F�n;��f���E�2�����)Ʊ7���k=L��bo��tT�Y�w2۹��	襁fڈG��X?$�������l�BП��Q��Q�Z�1��=N�B}䌌��ÞHg��|�;�5K�����(I-��h�l�7�`p1���?*�;��b$-��b��� Zfa�L� �8�Q`�.��k���B
qo��;��ʗ�{���.R�@I-
�NQ-�Q"���	G�<����,����q�%o(������~+�j	9*�`^�É۱�/��B��̄�pϯ��Y*�A��E�=���[�b6lx��S�|�9X�pɯq�_�j�����@|a���.����]��S\^�u+'G.���keh��I2� 'nx8#]`H�M�D�B�f~�,�9ڸ�m�?�\n:4��s����8>�G4�@'�u†��S�P�wt-��Ĩn�|5<r�(^d���@H�2�t�P�̻��l��Nr��Y����d�`��_ ��Sݹ_�u�Aֵx�`��YIb��ݚ�$cZ�Gs�q�f��~/�_� �����:�-k�>D �Z��^(y�̆8pp�l\X}"�M��LW'�HɵF��9�������n9T���B'j���*$ф��;�/�nt��8�.�|��%��8ѫ��/��� ׊�խ�~�8�^ƀդ���0N��k�>�Ҹ���Z3��K��ќ����^��G�-���f�py
��3;��X��iI�Wܾx�ĵd^��ۿ�3-ןԞK��<Y��1 ��f?V��'�l�~r+q�H�۩�N~�c]K�_��o[r�%N�:&���/�p[���`����L +\d1)0����3��߀6�׿�b����,Y�@L<����-Io6�=�d�$�!>�tbE�d�������ܻ�_�S)��OwI6���Q����lB7	7�g���#L
��;f(���f�� '�x��@�{n&��Ns�3��I���4*�71�J榽0���mpӨ�[�/���N��c#kd����E"7��R�@je$f߁9)�����"�D�_f�R�G��^1�U�<u����]K�e��,;=n\0L�p���Va�w`O��h�Ĵ$~`S��c�����~�`���ןs���7�F�<o�!�������
��t��P���x-�C]:TVI0�����OX���G���2�4[I���,�d����p�'m��{A��3y�%+1�z�B���&3b���O�U�������<���e�K��+\Ӣ>��;��ʄJq�yq\3��N��y�y�\�U>��d^<��b�0�}R�p^(�,Sn�<�)�� ��
��΋�/�����+���k&ڋ'���By4�>���o򬓢����{��Cԣы6NViuY�D�����E���?
\Ӑג/�e'�����P��3I�Cc�"7��P�g�5�q�>���3��s��G���]��(]�й��]��ER##�.o�Yb��X�D�/�粰b���OԾWe~�O��!��,*��<��G��,�p�_P-��O��ab���$�H�U�C��R1���5�%bg�5�G8�E�
��wO���iW�x�-p��m�I"G�,	��|�����   �y�J�N�el�U)I-���x�ͥ�E�[t�\��$Ɍ#KE�&Y��Ms�Ԧ����JV�ϙ9h�^�ҽ�oL7.+F�Գ	�;�_a���-*���?���ٍ_iJ�s�"��V�F���l�L�x�$˫�4Y"�g;�\s�+M��ܧU�QV�^{�C�L�O�P�����L[�32�:',1cbX�a甄n{�0���w�]9m��s�{1�sy^3���O�Es�'q��r���SJ�b��UR˥��4������jZ���M�k*���*�F�׬֬�6E�NC�)��>���=c���i�y!�(�F�#ᴓ�Gn�Ds�N��e:r%�N������A��i,9�&֗��g:(�ԥ�7y\W��D3KF_%�ƖWľA�7k�(�~_tW[dJ�I����;?�4��r�v�у/2�&�L�
�@���@_��{�#dr\��Hh:�k�c�2�쿓�����PLg�[�F��Sě��z̞e�G�TT-Ml���`�+X�ľ���x�*��#��A�/&�)��F;�` [`l�T���� ��7j�E�e&MRD�s*S#$�t8���ɲ�Yf:Ƽ� ��i_�r}�,�O;��(o֟L�=��X�ϩ�Qq��Ns��N�]O�<f�q�77?a}�S����U2�U�n��V����*��!�y��otˉ�4�
e�ji�`X�Ox�A�A��b$��ƋX�0r�p,�/��]H��I����_1��ڲ7�A���)�p���;�}�{:mZ4} ��`�E�0�	s�B��4�h�6<n��� ���L��wW�"v4{ī3w�J���!玱M�b�4�k��8��A]�4��.���x��4LP�����d���u>��50�Z��Vּ���<�����5�lm4�����4��mr]�/on��ElK�P<�+Ŷ�#��ckslUӟFCۺ�[m���ĒU?T\_��qL�J,i�| ��5��XI�&���^u�ශ`�j[fP�Ē�'��̧�4�i5�%hO������)R�Q8*#G�Yb^�.�(�����h�B������)��קp����ZjOX�1���f����k�olh6��+p�t���b����e1���~�i��;XY�N�̻���˦4����4���_a�������U�W�͋��'��;����Y�V��u��AiԠl���u)N{6Y^�-��1s�B��L������S���;z��z���#E����\���H�ͅ�d=c����`�kya�jK�m�rޢ�Cɣ�1��t3�l3���P����\^�\�+_"�o�TǊ�8���]�j�^=h��s��\3����B�EQ�{��ͼn��+��6/{μnk4��F7��ͷ\ޗ�(.T�֒��y�Ҹ&5��֛�{�ϗHU�g�Ka`�3 �K��>�b&Mͽ��#ި�^�Z_wU�)̼��=���e�2x�[�S����o���|��7��Eޚ}���s�e���Ar�d{�n��s��Đ��1��3d�\�)��p� nҊ"{^�(f�{���b�̊)'ly%����<f���w�Z���n��KfE�3Z��r�}$�-���;�11{�(���+�P������]�;����
E��~���
?���YRs
��y�E<��<��V3+��6{�s�Tޭx~D�`�rs7s�/n2�
hř���_���2+��[�!�N^�6X+���\��ʬ`�Bh�bg�`r`pǙSW�*XQ�C?[؎��TԊ;����7~̹S�%<���k��/"E8�Y1dχ?���S7�͜"���Y��H��_���YqㅃjҙʊG_-/���e^CT<�PǊ�(�Փt��(+���+��ǠXr����;�e	�}W��Th�W���_X���l�,K�)KV���2�KΨC�oE�S�[�V=�JX��g]�VV�lr�Y�兣�����s6k2+��g�� Fբ[�"�+�w�/�y^_ߤؿ5J�3�eV����G�ˊ8�R9XU��Z!��/�㈑��\�	Qs	���[�
ߊB���/ꉉ�����4�V<�,T��,���7c����D��� (���tOQ7�
��nŧ��G�����{��k��]��q_W;��E-�WfV�z� �6�Y�1R�j[~�*�+J�׷�K�gūc錝������.�t.�AM/%����B�������ў����c[�蟬Zj�e�(�~$i�[��@�W�t�r��a�hN6�p��Y��odK~v�l�8g��s}[?���+�#���gMv�φ��b�G�<L(ԙW�6��q��(s�n^I��h�b�gp�*���zzY�Z���Ƽv\�t��%
�ʦ���Pʦ�-Mn�,���M��+�o�n��y�fZ������KC�6���2eG0�!�G��JgP���f*h+�f22h�!�$!X 4�!�n̶I�%rS����3JC�tR������,R��Y�"�ڹ.�ɖ8�B�H�A~2w� t�Uq愜��W�ᐴ��W��Q.4����|'I�}��P�o���6sJ<��)'bm�ZT�/���Z��s�^�_o�/�Ε6r����f�M#��I�ɮ��a0'c[�=>ջ��}�����̄)�ь�<�W���Cw��x��=��� i��{eLyO����\>s�G��El\.K�s��"*�3�(W��֟�/p7�|!�FN�:J����F�Rmb���\����야�;p)��G�Zn*x�n���T�/_ބ.eÓ��Ѽ�A�Ù��lBr��	*A]ɂ<����MH����RQa$N_9'�$L�xu��t9a�$4������E�N��@#υ��3������&�7���b��u\r����ߗ��\�r��F^G����~`��>t��L�aߙ�$O�΄�|���B~�ė��C��ל��>g���E>�3��_�Y"�cǾ���B����.�7��0p��q'��i�|��>�@]�����o5�6�FFcA
I��͑-p������M/��I;`L��c��x��'ö��;x�2�2C^��۪q���$�e^�]����[d��w�����!�J�I�5D��%#p耷j�ѓ57-6���9�M����L�"�fhKI���l{;��n�_��_'[�}T��8��Te�v��
^��;[��B�e�ę��;y��E��^`�����bv��)�����?'I��y�pޠ[�'�ųI�?�Qߎ����|��=�4���uc��4��s�,+e�~��0;HU�M�~�r�I8gZ;>wMWJ���J� 7�p��?-������z�漕u�4�ٴ��\CW�9�&$K����f?|l�����Gϑ4TN�8�l6'��ޏ���aK����YM9���9c��"�WN28#��3��!_�_���i�U�Z����͈����!��}�C��h5�+8e�~�f�k��@�W~P�s��M#�o��Y�g�|󕯤�<߾���z���ͭ��W�n�uw��_������rbdc|�)��6�����/r��u���pO�R�7o�߼#��y����/���������Z��?:%�D      ?      x��}�r�H���|���8UA�GS���*���z&b^@&R�Eґ�~�ډ{&d��4��-s��}���>~�/uW����)���߭v�/�+��K��l�)>6Wץ�q]V�ջ߾��j�j *��V�|�?U���;ɲ8���V+��}�Wq}���qqą��GU��+����ir�O ⚙z��U��?�ϗ�����*�i�\?�;�7?��1^EW�.�8�ڗx>u����(��SS��v3���8Ǖ1��w��8_m�W���1>\�KU�wPA+ӸZmw�����K|�Ǭ��hlpT�[>4��2>��.o5o��k}_�\�|�7��k�W[�C�3_Һ�h�U��J��`��Ƿ��R$�s�iH��	
Ơ۸��&I�t_y���|��3\��=7��4��)�d]�U�q��\���^��d��D��0��q�4�H*��K��5U�Uvà�+��j'�fz\�n2>�� kR�1ٹ�k�����7�4YR�IU��:�j����8�U<��Qe��c�e��g�q3�d����<C��څ�
���/M~�0< ��]t�7�	�W�1��\�TqJi�w`<�����mSe�Sj�l�n1�Y����N������\��>��0|U�ɜ1!���8M�rr�Xf�e}W��l�%︣�����Қ��E�c_�8o6{�X�8��q�MW�?:��&;��)�ty��$}�!Ţ��w�&\{� �NM&4��]}����w�!�#^�sN�ǧs#��8�#�t۾�6N\�Iry�K�;+����u�I��5���Q��i*ȁT�+w&�<>����r��.ثJsm7���ϸn�5�����D�'�m�m�"��!��"O�z����[N�������ݩ껞o0?&o�9������X��\y��o��߾��d$T��+oΓ��*>�r	U��UV_���*���ɕ0�
#�.�:8S}/E����K�~��pβ��&��=r��#��m�\ �`�Ǵy�^�m���W~?r�T}�C=�7���2K��=b��^`��@���zn�?c��X���^sѸ�\�{����Bd^x�3D�z�|�}�
\~}���3�5Y��K ?�?�I��%S�#Cc����r�h��e���Yv.�U`�k
ĲԘ�O�e�*���x��NGQ-������/r�w���O���.��@1[�g<���
|;	8���B)�h>=i-fL��'�P$�8xD@��'���n�b���*�Nn��h�Z��e������>��ە
�iڵ�L�Yƣ'{:�MQ$��
'*�ghDg�]ݝ��X8ǿ�E�ft��0\T�L��� �7�U�yk@ZU,��r���|OG�V�΢��eÌ0�e|����t�o�2�8ʽ�I�T����(�@T��<jʀ�ZR�|�O�h���c!bW�����h�0Q8���'��6�~|l�5EяA��������ߠ�o���5yh��P�E;�l���ToK�7��ۊ���X��#��,ce0����o�qSD���f�b�n��&o�*�K.|� 5x�:V8oR�0|��/K�����d��'@��`!��1��>�3�P��-L��L}�������!���'����q��8ù�W��	�7���\�Ur<��K0�F{f&ҙA	��. P��n�k�,�f��jXM�bA�f�4���
D{�T~2y���������<rV���廉�#�h����t}��[�"��9�굚��lۋ�#�Lř�(�@�^�cX�[�I�6�P�*t�\o�[I{Eᴏ���wC?��������D����P��jt���@��h�؀;`a�=P����|9cBc`�,�+���v)�=�9u�ɏ<��W�q{D�}���)��e���<�KL�a h�%�:�-oM ]�9
o����/-�,�n� ��,��@���Υ�ܔ���Қ'�j�{u�cy�޷�4H-�{��Y{�x��R� {�ߢ��`i��5�Y5�֟�X��@��M@<�Z��o���9S�7���� G��.t��Dw����|=勐)X�����@�nG��lۧyP���=򓸧L���(��3,��q�>��J �ݨ�os�R�Q-�F�]���pa���a�v��a�䏏/�_�T��'�3k3��PVr�眒C쓚�{.Աwd_Bg/�""�7D� �2>L���BL������j��G�^��W\'��𹢽��Xl�c�7�y��R_��☛h��W�1�SB�to��2��ˋ2����@����X7������ׇ�$�[OX`f�4GǦ[�Ӷ��wd�����+=�� egڭ��Eb/$�9#|-k(���i�%��W�ܩ7y�vzI���[��S~�K�;��3!�# ���5\�"z��5��.1�[��9����܆o
�p�1/D&�/~ߵ�&m��?�qѹ�7m����T�eqԢ54}���GjW��񺙻o���-�-��ӝJ?��~�o�͌���=lѹ�3��ۼ�T�i��]�B����<����flqV�W��Qt�h�5������h7]�I�Z 6��G1�{�3Pp׽�#��M��
�F�E�ƌ@��$6�=�;����L��Ԗ������n_�9C����axd�^j^�$��Q���A.�D�v�a o�	MS�V���0-�����6;�{�МAp,stΒ˳��]������U���n�/�O��B@`�)��n3Y��6j稈Ej��m���m�ft���l7��)a�b�̚�rv۹��P��-?�wG��T�@�y �a��Q��+@.�Yv���?���C�O�l��uDЉ�wE#[�|�0ݞ�꒪�y\4O���F*�/�n��"M ����(.�>�|n>��De��ջ� ���h`3��ȩ��E׋�x�	�����jX����%'g�[NY��.��( �\�b�]hU�*%$���X�(������Iw��,�ê�;Ӽ)zA�nQy�'w�V�sܮ��.��J6��D�ך����^>��d<�,���H�NN?�w��v�f��$`H ��#P�}����j�J��g��k�T��WAz?`��@?�sw�# z	�ӝ$~��0�/ �tQR�<v{�ε��*��]��שBh00�>�v&n%�����f��U��m�_j��@GK�����z�:��v��%y6�iU�禮_A���x�YXi��V\�0�ZgFZ>jN�(8=�60uN*<�翵��0,=a�ω�0=��=s�E�31 e��e%���h�g�������P<������ps�s�o�pb����	ԥ�����G�)N^]D����F#�wI�s'���x�#�Uw�,8'Nm��ϣ�{�H�����.�Z��3o3��q�������դ��R�Ŧ&�A�!�ࢾ���n�|O�0'�̃�!�}�2����������wQr��1%���Y�{ ��s�z�����|O��<���Qwff�@���~_���� j��k/�z!��Y$�
�M�!VE2B�]Z�ErIg�,�py�u�	a��:��N!V3um�ްO�S�Hy��Mz�7!7�ֺo!�QpM��Rsp�h�hrj79�� ;;}ض�d�!��y*'j,Sç?�42�j*n�؛�W�ͅ�b~����s���[V�jz%����6N}�i�

u
���l�޼�X�{#�Z�5&��ο���:����Lg�X��֋̉�q� �M]D��$�l�d� v���#N�gU�[R��<w.�p�K��`������ZS��a-gj�^��6i��+�����sO�b�]O�kIi�k�W,m5$t9S3ht'Z�r�)yz�k9o��	P{ �Y@j�N@F:^/&�/+g7w&��t���M�n;w�� 8��ֲ��[���=���.Y]F����n�z:�X(�(���o뻸�:�����B�����f��}(/i�����ф�4�����J��n)�Q0��=����q��2� &U�4����ǂ�6�dn��z,.�;���CG����]K��    �|}����B�����j@9� �WҞ�v�S1�r���O���FO�3��l�=l(G���q���5�p"����F_'������(Ďŉ""&#�L�q\#�Z�fJ"���F�O��#�R�i�:�H&$	=gڤgȼ��Mp՘5�4 ��'S�8_I�(��k��4����wb*��z֋��nC������	y�_ԁ͵`�C��ͼ7�	�%����+�X���?~���̱�(�z�wu�z�\�{D*��^̳�
�b��saߕ'M*T�ٞ!2�cuI�y��"ـ����A�㷠�|�d���+��v�;���7:��� �se���[�6){ �ش�:��>�$aߛd�Е��Ց�[��M���Y��6�x�.O�K�yI�xRbB���_@��'�.�z:��&���`T�A��t��j;N�n��8�8�8����w�ų�d�H��/-F��N��z�'��$s��\S"sfs[����KN�(��1����e���I璸�	��@�����n,.+�
.�g���>Aи����}�;����[����,��)#$%{�>�6$[`6��Ft�B��hw�$��	;��E��,;gz���^v�4�������t��䨊�vUu����օ��o��i"�a�'V_�/�	:t�* Β����`��w{�LHvf['l���[�N}3���?y#�Z@��B�-+�8�sS�� ���`�&�X�@d��X�.���l.ҋ:�^A7m�p���G�a�k�MN�k��A��*��%�)�-_��a���3��i&����� 4M���S�2I���	FV:%���3/�R��p<,�K��;'�X�waK~Ok��w;��>[0Q�ٙ�%�A�Ŭ
w�g |�V��{���{ӈ���<3�-T���=�����)�9�ᙰt�q���<(��Z�M�R��x�V�T���^J䤸��Ͳ,$�{�3A�EH��?�5f{�P�Ӣ�i��L���.�C�d��"��49��^TQ�soΰ �cR`�[c����n<���~y*��Y�D��Y2�b��u��;���π���j8���s�	<�1[t Ȯ� ��ɽ&�j��_�)�[� =k��#�����5����o�"K!h�!]w�f���X�dj2,��#w7E�ą�Z����P4߀r����� �3�u����ӊ��6 \XYӄ�=D[0�k�#��d=��vM��M�,o�V�Ԗ|mvUg��U��ߛb�Аe�t��u�J��ۙcPhQ1�g��	a��KSE<&1�]�5`/��� 8)�"�9XS�,�vH"½��� �%��Y�@��jwj��Q5�yS��� �Z`��g��ff!�If���pӥ��qB�M�\��@W���f�/s.�&kQO`�<�����ߺ+b:A��A�7 6�t:��G�~l�$��`��j_���q�a�&$@�׸��sH���P%*�؉����F����؛R��b*���8n�,ky�������f� �s��8:���"3��	]����R}C"���о�g^6��[��w��;C�A![@�3�Yu�vɺ{���RH��inB4���O��]8�*���b�#���G�娰g&�PuI�����4��
�cW�a4=(b0�� ���������>��!��Q"�Gy������D�ˬ�{�6�V�(YyF����5 ~�SRq��K1>�`I�#�ɄG���sWڍ�Fs����.c�M����yR\���2��m��޻� �*���z�����8?�l�YB(���yS��/@yFv���2����m�AǬZ������O�}��t1���kzĽ��^o_�S3sS����G.� �΀�q8˪��_u����o�˻�k)j�`��xH%KP����D/�ho���W��V�����	�QM)��M�`���C��ȎZ�TT�=�Q����L~�iA�Z&�-=7ݨIY�t���M���) �꽝;�����h~ l�������Juo,X�F�,�����<6��M7v�9fLV�_���C 0o	�������T�zI�f��$S�%�c�_*�(������kS�v	�'�'<�OD�k�RA@ڋ��;�4�n��Ki'�8�g�H����g���X@>�xU�3���Qt��`wc3y���a/�:8��-��e��貸=XJmo���q�	�k���3��@zS�UPu��y��@��M�>���?8 �����EW�O:�֨�6���r"����|6��� ��V��6�&o���#C�9��.��zy���x�ῒ�b�Q�z�����t�gq��d�����ަZ}e9%��ۥ�{*�EV�ERj=cd�����2����E�)��N�``�E�-Y��pI˔{���4�]T%��w���˙0-sB��,��Pх
�kX�4�R,'�C�����jG�;k����Z�|V�aq�^+��a#�4�#���!�Nlܖ�"�]���#^0�֛&���(�``�7�����E�b�����{6��&���=�eO���Q�ڃ��`��e��>��5����#[��}��ۂ�խ��{0���׋�0l��=���8F��X'%d�Z�ƫ>~�ӍZ���d��3���r���8�I�XR�o��^h�TO�@�hI��'�8�j�̦jwV҅O�^O��:�Mr*e�"��AQ�%�3�O���t69\���2 �g�\S:��G���D���r��;��D�5�;�R��}�*�~���C���a1�*\��e���|�NsOA��i	��3s5���Iv�����K���u9��d�A$P���To�:޷}�P�ՠ �$c�`���g�Cv|�p1�Ypm'3�eX����g�>k� �4���D�t��k�B}"��l	�%��A{��OX�}���o͒j�� ��,�(��	ag�����#WM�=�Pׇed��'yB���hZs�٢���6��}�AƧ/t��K���mGXfOd��U5�@���Du-�֤�K�7�g�3��
��(��au	�{�^�� Z萷O03��T\U�i�A�+��I���G�� y}���\�� �9"��-8��U��I���0�:_i��W��*~c��7��v�f5X�}I�m�r�J��7�?��' �Q�	�����>S�ju`B�\!���;z@�Z���������2��y�/�������M�8Z� #��ӕ��A�7�"pC]ҟ -��"���;��I��>R�9  }G�e����/w�]���? mJ8�5�	ߝ&�}��)OC�o4�h�� 3��-��=��� �S�!��3���bΏ7���:�Q#�9�;@wM��3�������X
�tڭoZ@�T;��Q6{�2�}*Q���ا&i������P�����Y�P2�*p��UX:{�����m�5]�\�ŤD�`��VnG�曫d�kG�?���Cn��4�m�ް� +���F���K������?7�����@`�xA}�~��w�M~�!��_׿g�׺R_a���rU'G���q��wݷ����Y�����7 �^T�H ��}g1~@�n�j�~`��ҞD�n~`V����yK4�]��«!����FlzH��� ���]�I�^dc��y�>+�nbO�##K���k��t�Y>!�d���ѼI�J/��ww�F��$���ڭ�����Mvd����7���a�B}�p�x�4�,�o+?ZjeG��LUA��n�;�Y�Uj�j����c��	�FL4b.5�t�b?W��\��~��U��88�T��Z�L��O�D��p�Cb�@E�M{��|�wK�pJ8�̣�aw6f�UMza�e ͢�â���J��T[��
6�pR�B�9�� ��z�A�tk;�.��j.�P����'H>�D� �	��D���_�#뮯d����'��JYpȴ�eԮX#x�	3�Ah,�	������;ۂ����Z;D��g:���l���ڌ}�	90�F���b���I�w��
?!d�!l54�$�[W`��%k��� �  �Obv;��XC%2�M#���ޞ����x#o�R�H͓���g��"Y�ć�8�Ч8;�z�JI����ʔ �)NK�Y �u�)erdЕd�|O���Zu������ x�&�C<�9p��H������\q,����Ɓ�Yl����c�v�[�Q;��0�c�+y�M��c|-=_����ͨ�j[�]{�J�/��)#�L <��};�}*e��y3p��}��T4�y �>��!��r{"�N@2r�f�>�������=4��%�83��
�(���Y=D�5���ѱ�+.T����Ϡ����I����'���~�⁒͡s)����-n�?A��^}(�=�tW��ZstH��&�d�u�H�1y�����/���FHD�P@�nt�� "g�Ki_�z�!L������ן�������M����TgLE��{^�:t��L/@���Lk�s�z��Yv�F�ʺ�n�?�؏�Q� �L&�6�6BpC���W�jD��=���H��'}��G�$���N�{4�ݷ���Se�Mqe���qS���7��;�9����
`>�āݗ�qjWA��Ywi�.?X���S�6:�m��wo�MI�q��T]�Ue�^ɡ7�/A�&`O.vMB<������L�	���q���0�-}΅�=�`�v��@�&"өݎT��d��u��eV� ��)l�g^��� sZ	Z�qK0/�j��4�O���XK���Q-`,T]��;����p�%Qw�~^&TY{�Ȗ	����
����)n�!O�2 ��J���.L�Ӡ���)��7,��ڵ�U��Ш�q�E7�7�6,6h�����#�2�Er��!~u+��s���L���rZ��*�,u��K��*���me	j&�@�ڃm#�O�������(Щ.%݅ -զrd���@Z{���ۮb+@�F�aE;4� gr�Nِ+�Z���Jo�JNg)_o5B���nc��+�t����ڼL��W���b;#��	�|�����c�;Q!9^ٴ�����]��%��7O���pg�AK��8*�?�������b�=ʝ�F�Hg:\����X��
�	m�P'I��V�+`F���&����1�Yo_4�p#l%v\Ŧ�6��k��\ī��gG���,�e�oPL�q����` i�
:��Tj���{�f����	,zh���-���o
*�+�sRW�_�$�����ې�:o���nϲ
��5˱G��Aݭ-GFL��$����T�����P��v�3kʺ�����wM�%>���|�0�I�V\i<�)6o)��N��5+���ڦ�b�w�����E�i���`��i��8�ׁpC�5����Kye�4�n�����9�����Q��d2�S������6�&��¤�I���*22l���������\���)86c�b߈���G�UY}H�9�đ�ďа�&nv�>�q0�	�z����w ��^Ў��ӟ�{����������I�a�M���n�JQZ�~fay)G�U��EJ��n6�����:R���(�.�e��w���@�}�ߒ��Y�O|gR_l��k4"��ԋ!X������5� ��c��^�����L��`��r�~�K�B�X󃊣8xB6J���^�
��� @�:�'���Z'S�����u-I�UB��J_j�׽� �
�?(��AJj&C��j���K� g6��DhM� m�W�l�[��PR�,a�������ax����~V���dK�8�,5D�P!��j	Q��pf�i;�t�	�>���8�9���.��+H�`W�����+;m����K�=	t����1�+i~��6�:כ���-��ŜIF�R/h�s���ƛ�����������rn�����N?B��7�FF���Ѥ�:P+�F@Y,]{��vV�D�$TFo����L� }���mL���e�r����O���DW�Fۙ�kVt�? �����0�}��OGƮ"\��\~� 鿀�uaBm�J:[K RY�v2�L����ժQ��ſ���)Y L�ɶiu)@z�䰠~�7��+D;[�0,�����'���n���0R'�Q�����Γ��_�q����R�L8�+�~���JCv~�����3�
؏�25�6D�z�HK������8K�p�[�H� W�(q�X4��+Fՠ��H&��ق��!K�Z�_��h_��N�84ּ�y0�h�#`�}����\�]�������ut	q4�`����e��uAwv�\[E�`��߀{�o��A+�6�y�Ƹ���d-P'�D���ȞրJ^֊��ѵ���J_/o����4:��i�F8ߔ9U��kM�te�)�8��o�"�ၡ]	���K�Y��g+��X=�(��ζt�8�Τ�)��v^� ����Y���n[�	�_�R��v���	���7R%�o��:��9�T�b�B�����XK�M��|������E��sF�^a̾���Y[�@�7�<�L3�h��2���&
l岣MN��~+�86=陮Gpy0��FI�i�[8�˿�`l�b��-�B0���6V�V+��s�̱kI��s�},Y���1zr�(-�w .�m�C[L2F��p�=����s�lT�fu��p�b0)D�	��I$���$)����Ó>̈́2q[��G�~𓗙h$�fycSK���/�� ��MSI)���5Qh骯�}{�h����}�Y4�zxr�l� �����V��<y扜Q7Jq{�kUۍR�O`��v�Z�[g��l�o����|�HB���E��_'�S�D˯o#F�I;�(Zz˳��/	�l6?�t7�^��Q���k��Y�{��,���l�W;Q�:�K�7��{D�4R��g��$o��{:��)s�	0[;��-��Ƭ��m��*y� f�w�Ħ,+_���t*�vc$RW��pc���[u�7�}�M��HǪ��CK����$y�ͼ�-���?ֵͨ��d�\C���JC�B~��;E�<�fr`[��(���5�W�"{c�.���9�̃�#���7S��c��Y,O[��	z���_ޗuB��<�y�� Ǿ/J+���f̯��٪y��,Ԭ�V��οZ(X\��@#6?�l�F�Y U9��Q!+���ޟ��L<R��98M��fM�?ŧ�^j�ΞtwM=�/��#uk0F���������Ȯ�gG�I�gu�Hߏod����2S�T-�p!�`����-���-Bb�q���ۍ;1G���k�]�l��Gr�bRЍ�q���ZR�y/�j$�x����L���u�<������ yWt��+J�4`ނR����'�se)��䇄;�k{�4�t12�ɠ�¢��OE��{�d��^/BZ^�G�H�o)��{�	��"�K9�=׳��WC��%B��f�Ucr��ߍ����6��?U1�7�i�%MՕѫ]Z\B��{�N0���ɱ�Ƴ�zv�L�#��;�7�V��/j��<Чr垶��C�)k(���;B��g�,o/����~>wu��M�_�Gċ �vc������h���H�#OUl�*�%�EU��m�_���5�KK�'��V7n�IE��>�X$�ټN�d��E��o."�E�x��0Õ��4�\��eF��@}e�B��W}Q@�~�]ڏ�q��^<��@��P�U����d��)Mm�_��R�ہ��߇s��_�"�¾\�%;�SKy��&��uo�N���5 �� K�s�����
�,[jh��S��Y4�����H�$�Q��"�K7A��?��au��������9���́��VOoq9��>�ī�ˉ���G6����K��¦\�4�@O�*�5��V}j������r�k��r�f���`�5�K�7f{���Y�-:]���<R�k[��c�n���=���[l9�%i)��')j�����ͥ�J��Z̮����t�H4���42�6�M� 2�2�.$'�\�e�W_�����,����o����$�D�      B   6   x�3�����N,I�4�2�t��H,�L8]Rs22�,CN/�PvFb^
����� [��      D   s  x���j�0�Ͽ�B���bKv��,EI�,-a��Bh��d�G��詷o��i�Dy�t}?Q�,$�<$��k3�p�dj�>�}��r���.�z�P�+Bsy�\Ρ[��LXF	��E�􇼆�����L�����؊;�u3�	�ݬ3V���d��OE�1ruE�3O�g|�N\��s���Lx3�^O�"1�I��cs~z����`^�>��Q�t�[VT�a���&�δg�yN���3�78�[�4�5m�j�����vt��=���r�
����hG������9v۵�^��ޤW��R%�����6>ݰ��i�v�U�Ms� �}j魇tW�^���-�ʟ{���o���YQ����      F     x�}S�n�0<���_H����V��/!v�K/��8DXQ��$��w�6� /��p�;;� ��z�Q�$�8>c���]B�'(P���5֣�<�����kE�����	b��*��;��H`��p�m��n�(f�^
�BY�X�������L���G��VyIr#����'n��!�4
�a�A�V_�x�17�Z��'yt�>�R��M}�Ia���Ii��xw{-��+atȿ-`�M�[�Nf\)҉v�q��*��D��R���m�kk59�n�f@|��L�=;y��h��d-�Kg�~�@���0ΡBC�|[�+��O�װ�'i�ſpo����%� h���Ua�h�M�I,4b8}��b.�����Z5�A��E�(<8w<7��dW�Vԍ�n��!��$vG6�9�Y	.�H@�*~&����${+���Ka)�e����x|y�F��D��B��jǅ���H��>b���\�����'N�Dߓ�8ך��iV��v�cG�����.�?�m�c      H   �  x��R�j�0<��§�^J��7[�����R
��`H�M��C��;rB�|B	�3�ՌvW��9�c?~��lID��9�z�CM��0�0!��S�S�ӸE�fb*��lw��H�2=�ߒS�C@,T��+�`�T!��6��,v̈́T����$"p�_3"�m��o����9PB�(_ �q�@ƹ�PN>X��LG���m����ܵ�8M��k|�E�bL
��x����~����+y��(��5C�LY�D�>�Sh��H`x)U�bL
��ǚU����6K�X۹f����Z�i+v����`��7�6&���줂����U�ZPvC���d�B��U��n��{?��ݺVm�.��ĳ�Tv����q�aU�ԷƝ�p�[��<>����a��^v����l��o�(�^e      J   ~  x���ɒ�0@��+�N����1�)��\����@���}Zc�rf��e��ݯW3R���D�	#�kלk�@�_3��_珮���t`�w��i���]*wiN��,�"�e,�i��'X�r��(����듒p=��$'ߠ��/$�~�,�ޝ��Z
�y��\h!��K�p��q~d!ȔV
7�L���Ϯ�bN���=�apU��^�a}OZ�h��P,��f�T]g������<�?���[�C�7����`�9�*�w0o@ј��������@~C��wjZKG8����q���CO��Z���Z� �ͽy"��,<ď�������5c%�bh�S��0Vu��������1EY�j){6 OP�P�-'bj���=K�w����ޝ�JK[h&>qSXO��s���1'���]w%5u�	�k�`���;	�&َsʤV؇�]&�2���!���)�F�T�r)��jT�RU�T1�%��=��ѭ��\�ϧ�ď2[ג�3� �^��}����f�]&��7���T��F(�\l�ز�llMNF���J�w#���T��]����^ڡ�eE��CYmM)-x���^XMq���b/��N1g\�o���|X���y��%I��w�3      L   �   x�M���1D�ݯ��\s5�w��1��M�Ub���B��#{�-��a�9#��8���(O�LIjh���O�$�����t�z�]�b\z�Ei�}z(sE=4�M���ʯ�����(����1��$݈k�pB�hn:�e���Q����!�'Sv�wM��s�CJuF;�7w�����tU      N   �  x��TKo�0>ۿ���~�M�[����bi�K/��$leɠ�ޯe'��mĉ)R�����EE�UK 唠zݱ�cg�B���:�F�]��(�4^�QA�����]
��΅pa<���ubZRv��	�Pƀ�'A�|��n��j�@	��pI�Dy��G��(=�����ʧQee\0��$H�3؈'c	%ae��+�B�f#<Z�0���-�hm�hְ����
��֒�zTn����j7}���5Yم�ϡUHp��s��z�6��� Qs��y�9ϢU����5q/>��Vi�,�e�3�܌,O�ܕ'�� �zKֵ���\�J�A=�!���dk�jz����2����s:[��Av��*�1��$��!���r.z���b^��(��4.�yT�F��o�~���ǰ҆%����K!���ɹ��#c�	4��ڢְT��.G�I�#�[;��n�)�mߵR�ߐkM�32y���8>�s��*-��'5Kc�K#>(8
M�#d�7�"�����k��*fU{@���C�#+�\rO�&<4�{b�<�p��x:�g��F���f�1j���f��u����jN��=G
.oj�I^zFǪ'�O�p�B��r>z٨|}`�W
|�[��X��,���bt�0\E&�'�p}tw��?.�~?�S~.�n����f�[Ͽp��̏���*gU��|N��V�3�W5a��������*�O�8��E�      P      x����o�H��_{�
,�p�,�����B��X;�eHrfs`�I������������&Mu�Ŧ������������Uծv�*��e�����_��*�+��Z����Y�/�W�,�~S�7F��~�hyv1;���Ź�|��~W|�z�x������������Gt_��S%��$g|VxtY�-�Ue��*�z��7�NY�������uq6;:Y�ϋ�|�~q4/���1�ӧ�_��S�?��K�6OI�.R]�F�7B3H�����X��*��ٺ�,����?�6���~zu��?����-<�KD������������jv�)����8�\��[��i�
�|�x��Ox5�K��z��f�<���X�2�o
���Gq5��(��� ���A]���H5���<<]�;�����p���W���U�|���:`��U`G`�a�9ԑ2�H�F�l[�7���wЃ'���t�4X,�%dh0��*�;-�(f�/7�?�-��F8|�AM�_����~�ޔ��b�99�}(�f?ϱ�f��K��J�+�?P����l�C}�Ҿ�P=j9�WC=U�*q����e�Ԩ���:���`�����I�v�<+���|v<�]��Ǎ��CV�V���>���ƞ:���?T�߳������+��-�L��-����x'3k���+)��`q�N�� �)��2�:�] Ӿ�~�C��,����V5��ު�ޒ��~����/k�W��r�a���@����el��jC�d�n2��,��_#�����o�Źo���W�&Hxu�H;K��H�Y��8?_0+�_���)��W0Y�]U��"��|+1
m!k���V	ϡ��iO����dc�t�y~�~~��(N簸�u�����(Z��9�y2�<ˋ4	QN����������Ӽ�@�5	��H�O�My�/�B���B�_�w�y�k�W2��6~�2"2��|�!��|�E�2��94d\2d�{#Jf�_.����S���+x�}28:X`E�j«١�ҡ��x��*���6��A+%�1�_2�/�W*f��m.	��'��S� ]���54/C�VE�f�f6���'�GdYX�4���Qi�HoX0(���7s.�UiZŽh�IX.k����F�I�H�7\� y�����_�6��/�m`��5�mo֍�����V��AOL��������^w~����}��_Yu~�~X�*���`m�琹o���N�- �������/���f1��1e�+uX��(��|��0���=�f�<��X-�/�6d����m�sP�%���3a�s���-:�;n���������kΘS�ąܑ�<��,^�%8F&�3�,L3Z���:�b�^��iۗ���_fg�'3vj�},`咵"�	ϡ6�W.�F8�nOj#fc�V���1�acn�Ɖ7������d,��ڃ�<[}��'�M<�.�)&x瘌�	��H�f>�t���{*,[l�Ļ=�<�])��i���k��qSN�S���O�����UƢ�\�);�������|���ˣ��������o�]?Y���=�W��}��K���T%���o��_U�-~��.�ڕ����{��v�J?����G;�h�0��.�5��(1=vO����]�&�Gl�>�g҄~����=��?�H�q��<cc��Ơa���/��U�c?���+|����*�ʺ1c��RM�J}����<�+����&����@*��H����߈��������٩W��/��W�R�K����]c�4�A�ߴ�a�-P9�y��
_�&~�L�Լ)մ/�|3�p�c�s���;�h�}�4��:�����wn�/�_K�x��{��+��hkNn]�n�`Xu��x%�.�eI���
?�}�������d���]%viD�ڈ��05��*� ۗ���@��g���$������S*xEڗA��^ma<(�d�3,@�~����7]���vW$P��-i��"�������/�g��'����M���cA�0
v:��"���\��<]��77���۫?����W������t~6�U����+~K����J�������:hٌ.96�l�u:|�w^�Mp]�f{(L>@�} /���i�*G�-�����n���T�X�?tݯ	m]�T6������)�/�{��Y�X����c������O������m ��f���_�.{7t�f=[���t�؞"� <m��<ख����eqq��XF���]�I�3qӻµ"ွ-�k������ɢ��y
5�"�N�%qp.��s���b�8kpJ��e����Cg2xx��>�0I��!���
�Qb���Bp=h�7j�3�N�����ջ��|���-�06�L� +!�08Ft<F\>�M)�9R�VD<9�
�O�#c�%,�g9���V���f54:���ǥ��>�ue)��B�a�#\���������őgz���ng��2���H�3�hy�Z�Wk��GA#�}�:kE6�(oTp���������~�8�ms�]��A�����?�[��b�)ђm��2��u�Ӟ�-�8R@d�;�$<	�
�Ú� J,�pl��ZJ��]���i�R�X%VXn̎�<ϠA�'Jup��$�Y����@�H	 ��5myj~�#b�� �%:��Ķ��O��ohAb�� ��}{t�� :+)zH
$VZ�GU�-	�
ʚ�3 M0���E�ø7%w���*��E�ٶ���ՃTl$S΀�ȫv�H�D�֣��3�B���^;�<��XM4�ɦ$��9}�9Pb-�,�c�Ab�װk�6��z2�T�"�1+��{��Aym��p���o̾[6f���4u5?�e�����O��~D]sh�V�Xi$Uz�=�k�tA�|�T�5,/Q~��|�M��I�^��� ���(�Gix��*��t��
�U�iJ�BQ��{�����`�*M�����ަ�[��j�@]-����#fG�����|�Oq.�.n�T獟8�-|�QX�N#�`W`��<X�LH]f���Z��A���8*Uyc�����$��k��k8g�}��]�X�l-��W�$.�5�k-P��c$�y"���Z5 b8�1�u��ǡ�!t��M��\�X��r��I( �F҉�du^�:o��`o{ӣD�jB֑���b�X�l-8�V��kj�Aix�� ���Xp�Vy�k ����Qb�5���{�(��z#�W;�=M5
T���+���Ճ(6�>D�YB�|���� J�����BBY�օ ��Lt���f��2�^"
*li�4�,H���z������Pī9E��b��jJ�U��<�3fr|�&�Vo1����7`�lW�I���_N{T�e�eȈ�//Y�7��B$c�N��1RU+m���>`�\�XU-Zh|Jw�� �*#�T�Α���N��@R08~�ib=���d�=�S��sZ#�R��`��G1��� ��ň�Ԣ/o�!���UR+�EOޞV�7^bA���ac%����sl�h������b.�Ȅ��dv��5Ԃ#��1�K4E�K���6�P���]]Nk���uI��R�;<�K"W�l*]��H�SP<��2W�l*]a��zR�A����eS���(�l�����R���T��`}�yC4����p�x)ɺ��i���&:y��KLk�.����ܪ&`$�0��56�3����*���\*b��3	�׸���]�Ke���l^}��,��^S�H�G���th
�?B�=@Oi'��g]��v�r��>�I���.�S����>o1�S*�T���Ŋ� 9`���N\,��u#f�� J��F+�>eag����bMu�
S�%ֆp���XS�I2cdH�IX�z���p3(`䚄U��� �g���ꡰ�����s%VT ��VV�֓1��A�TO��@&`�����6�koY�e��R��
Q^h}�O�idر�j*d*2kL~�h9e�Ɗ�����2w0Ze��u���G���#e�u��Ա�Vp�E�L����:��
\QܩK�~Oq�����:V�
�;��XZ    
$��e{��XO!���
���d���ه<"��Γ�ȹr�k��a�^ʙ8��*��VXp�5�����p��c��Z�7��c�׳�w����!���ƃĲZaR�~'@pv�6���[֩�J>�����٩4��Q��*5k��PF���ݤ/�EEo�j��12�U�f|�zvk$XA%Us�*vӼC?�������?f8e��9L�?z1Oꁫ��<��m&T�U�\�:�A�Z*v��LSh����'��PJSN���M�2M�CN��ղiy�SlJf�AsT	�*�ȩ1|��AK%�^���w��N)�����h�l-�hV��M�"�:2Hꆄ�j��j��ܕ1BDC��J���x'���Bن=ڄ�.���T�dm!RM�j��Q�A$1�i��vL��*�,�V��qB$U��,D��ڲ)D}J:��T&!Ra���=Fk����r�M���"ګg���HĔy�j��y�Y�����T]��-�,4D��T�?<�Hd��f�05k���iLC�*�T]!^i�u�F	�L�2UW3x���Db�-�j���	s���3f1).{0�%�����k �TS�&VW����Z��CwWO!��bcߘ����HRM�W뫄�}Vj�\+1a���J8J�O��c1�)�$VX�!����p�ZM�_�,1:B���h^�
H��~����y����-Ծ{:۬̄�Q�E�Q�9�#��+;��T�|������V�Ǉ��,=���bzP��w�������i� 6�%��%��)M� �D��q��`�U�5�O�9�R���Lj�Y3(���Uu��/[G�5E�(-���o[\���:�
��� =:���R uBEO�Ʃţ�����Y��T��SPzt*H�kE�mW���[.�A����1Ś�="k��zP����Gf�p�~r8�Se��;=2�=�8�D[�\����6�Y��D�' ���}ӺGd!pa?A	i���"�&Y8�a�K��bB��$2�`Ʀmd�B1ٖ�IDV����'2Ř5��@��ނB$n
I�3��|�,=�H2EeM�3Pp�Ğg"�����,S��R}���2�c������(�<V�){�l�^���&D"��&�(8�g3[���8�#+�������=�
��{�R+�z�k�c�� ���6�m�UP��=������*>�"O�#�z���*���a��k!xQ�_�}�I�U�}=��H�l�"��l����k�:B��Us�}dI�UK�z������,ˋ�(%+&Xm�Ck�9�ÔNxȊ-G�ަ*k{�1	FM0]*�F��-2P��1�]ZQ��9�+�1��
�]����D_Q���;�/�<��jX�8h&� ���d-m-��/�<��j��r�9<�IRL,���H����W�	{��h�xS!u>��Ib���C��#3�E6$h�RP��c�\����j�Ȃ	\9Q~.V_��do��~On37Tt8<ib��x�xSi�
 J ��\�����	��68�1�I��* ��zd5�b	�;�Y��mc,�7|SD�%�`(:��1��D,��]��,��j�z���ۖFK�*���S��YM$d��`��U��#�)��T4^��Ӥ�kJv_��K��P���c�'ǖ�U��޲�<��c�HL������WV��q�"#�h05�:Y�^yR6|E���C<rO�Æ/P<�GM�S%6�%,���"�(#�yҤZlx]>�c(',+R�N��F��2d���üE�#�}B�1�ܻ]`V`�����-K��XV������P�B�/y��c-�ʚ܎{*^�ICō��X��@����
�Ì��M�9H+1��|+��)LSt�`x��*�%������ʐ
�]%�K�c!G���T������		�t>	�0[,�A��V�I�����鉅��Y�2I3x����UQ��j,�1�K�����sf�Lٰ`<ni(6<iR��|���4���֞d�W&�d�?�_DCCU�m���2I'3p���U޲PF��t�AxҤ��[/H��ʕ���d�Wf�*�������]�U�m�s�&�_�"����.��1Ēd�y�f��&bA�h��<iR�[�a*h��T��yҤU�_	4����&	�A�T�U�B��Xܔ�I5.l�Ehi0��Ѻ�<iR��ڽ5��!`�Y�:�X�T��z�,f�9�q�[I��᾿?8�T�EZ�;�$�`6��Ivh���R͞��$�`����5̓P5�!�$̀��E|��xU8NV|�$�hΓ�<��ٍ�Hs͇�dI5�_D��}�V�Z6/�<�C���˖�e{�4�S��i��=%�D8�~ǳ�*��Kz�=W��F#$�k����N���*lp��)�O�ξ�,!��6�<K��#���G�����IX�Us�Wm�UtmA3�8��)_����T�ʐ-�<iR�5�|�O4Q�d�y�I5�(6�#?�E���U$�"U��p��;�@��rBb�4�A�T�G�G1f�(L\�n�T�!}�Eچh�H�R6����O��L^SJ�zm�o�D�[̞޻����v:��� O��x��~��잢T�|�X�-�j��ģ&��X�閎l��Е�o��漏5o���7	K�2���G��Z�zl�,.�k*'�a����E<����Z%�_"&�eAϰ%��9Hk�+��O�� Lq˦���b��ط �.�d�
's�j�T��U���4�F�mp؋��N�x�&�T��n�T�!z�����p̰#Ƥ��/���*��n�1�G,t�꯷'���`gY�A��ք�O���(M��������c�.]�I֛�
��NI楉2�zs`����lr�4e�Sx�Ub�ux닌^b�1^�Ν�� M��n�6�D̀S�b+�� M���N����̕�{�s�&�^��_ >����D�	��F�Q_bɼJQ&�pH��z�J��/9�,�OK��؛/���0Mq +�8X�d�9���"�B,h���"�xI����}XME[��qR�s0����80�^"2�����{���S̓J�=
���
SOp6&�zP��H�,�t	SxҤM#�9Ԉ]��i�_C-��=! /�.4�ʊ���A�t9�R�/�6T�)2��&I{�v{	�y��f�I��%9{˗�D�i AX6�+Oo�D� ������r5��M"J�^b��Dn*Q�@(�EK�t�9p}6�A�t�Pf��B<��da�Is�κ�$�98���@�Wt��ֳ�2r7�φ2��,�`�WtkLSӰB��Z�$�R�߃�C������굮��Q즧!Tٷ=0�Ec:X�H)I�
<�/i��ݔ4�Tk|�ůO%���R>�6�4�ea��O7�ĠN�3���4°�$��a�WVk�����a����^]�U�&�n֙��3xtP����*�%0�*�/͇�怄�ƴ�3$l���S��1	$TD����o�TOuŖ�Y�:=��TJ�2�o�w.ԩ��r�ìxcbW6MW_�lB��7�}�W��E���j*��x�w��	���M�$�Ҙ�U�*�Z�I9@�M*es��N��M�Xۘ�b7"y(�M��H���$�4�s�2N:s������=��4#��e�	Zm��%Dر
~Ǻ�hF(��+8J'w�ep�X�)ҧ:�:�/���>�T6m#��H� ���#ie�����D��'�2\���:��}8��o��~yyt2_�d�~|��G���>��|���c����W`��� N���p�6�wڪ�Vi>6E%�r�j����g����?ֳ���Ch�C�
��k[�2�hC��PG��B=�Ad/ڝ�D,;��N�� im�m�@���_&�P�z\�<��$&�(�N����Ln}$��Kla���3vxh���(u#Mk�Q�_yMCԘ���Q���R�s��.�Θ��Cl��c|U'�E�vX�Ҡ�[��Jnd�ؔ�/4��?�=´��]��"��y�t�``FNUQ�h�D�R�I��(�    ����B��s�;�1Mc�*���D*��e�ϫ�q$%�5�A�Tk� ������
�J�:��W�v���b)�y���ճ+���P�PFqD�D*�p�����Vʽɫ\�D����r���p��ٱ��
���@�pa�LE��nG�H�רgUl���<QQ:z��)��y~�a��H�-��Ty�c#�3E7����u�d��z����т�K��UO��WO�rB��q�J )�0d�����]E �9*���(�>/��s&��e��J��(%c�hs?�H��%�DD�X�5�:8�!˂���n��LY�&�*�.�X�!lG��E�M�}u�!����j,��7�.�Әq���U2�[�5.��K�#��K+������h��ʮRSb�ƺ��T�)�R��*˦p�	Q��ɬR�Uϼ��溕�J�M�kP�$�չ�p�T*pp�t�f>����+�J�֬��:h*PJKΉ�R����k�9�HA|�A-^�w#�9����\!��w�+�jd���ԈD%��
~(�
��>�:��}}�$J�S�Q�T��z�=݄-��C_^[t*r����9�ɹSX�ݕN�IS���@­M��Â�jk`��,r8���C�:��E�M��"߭��K�-[�X�XY��=Z��l�X��V�X��m����xra��,��D��*�O�+��{��[Ѹ��l��(��B 9[ 2O͈���̏V���Td�4d�n#p��ڰ�ڑ5�ĺj��Y��*B(:ۻcb]��/ �AL���ĺj�h��}��jRY�s�j�ɦ��EF(�J+���U�'uSe16�I�Tf!�?� 3���jZ7�A�TmIzfg�yo03�Zڒ6�A�Tn�Kk$<�r�P��W �ʮ�TQ/I�g��v�MXjV�'u����J��T�%�t�,�P@Y󅔕M�X�SJ�䵒�v��Q� ����u�=}�限��š#�5�����2��dq��C��S80�<�ⶲ6�P����c@(Ř��U]Y� i��yHD�9�Ɍ�hl��)��������P"{s`�J=�˜��W��c��9������	IqcH�~*���r"Rc;I��K8t>�L9Գ����0��7/܃�Z���Q�a���X{V��ӊHZ�e�"�����s; �6U����*� \�pH�$��I����}ĉ5X�A���:
ݘ��#�R"|-�bƘ��M������<�p�"�r���}ތ�9�J �VM�8QŲ���A�c<��T�P�/{��Tua������;i�V��Rٕ���t����\UZ<n��H��ao��3a��>B����� N��u�6Nl!¢�Yo\U�}"�J��w��!Ass|�|6U*�p���B�:�]��y��s�$�`����S|�VT*#<QR텚���$(�)5U ��B�J�W���e���)>F8�<�!�:�_��m�$���
�S�U{1�$�Yo�ԕ�[)U����OrgIӴ�Ε���p�:�^���vJY3���t��r��Jԩ�j�E>�q�3L79iG���/�P���Vr���G��*��R�<�}5�\Vx�SF�/U��;�h|ƶ���F'�E����m-�c�4q�ݏ&�3�0kL�'��i��X;�\%bC����	Z�9W�A�]J��h �5O�`�*x�z��~����4L�S�IOԘ�9�;.�8�1T�z�>|��υ>|��y������?��������M������~J���Gj���� �*P�~ψN�� M0�ϋ��K�L�??l?}�?��_������'�V�������%�.ʞ�w��\�K��u�}p��k~��?~���������Uq�[���\,n?]o�f��:�M������0CY�_���Fϓ�u�3I���f.��
N}i/M[}����۫�bg���`�$�v�pǀ� ��a@������R����k����������G�ā_?����K,6-ܓ����:��i�z����_�J�RW�1n���N��� sH���}����W*�J�R�_)�_��*��J�}����n�@j^�Tv�T�P�F;�K���Q���e���6ԙ�)V�/�a�+����-�L� n�q�Dsڍ�L[ ��)78� �I��w�-����/���h��x�b<��P�B<�����l�xRa�UfK�H�)��b_K�Q��溪�@�ɥHz���>$�;۪�8�1v���!���ȿj!��H�J�L�&���fg�	@��B����( լ���r�x�b��jw�B�=��eZWQ��bY�����O�R �:;�uU �˷@�:[���b�9 �t�����[�X�-���B�ً�9�1WK�-��9���E��s�O�P�㐃a�ܺE�E��pyF��.	.�uNM��$�c���'��li�ؑA�J2\���*W=��)h@d*���L�,���iIR���bSH,͜0q�I%* �KpU~�ud����>5W�h�@)b%m�X�Ts�f�כ��Eq1;e��};<C*�Ʋ6C^��̵����k�����IVMp���X̄9Yn�=���,�F���0N����t�R���E�uZ�Җr$���R
��P�a�\�:Ũ���I:���b�N���j1D��K�Ts��Ő)���oO��h 6��Q)�d��F��> �΢#���G�8|]�I�1eE�to9��t@���@� �.�"���̶�M9xS5�������E�Q��|��} ��:D�i�q��E<��׾��@,j����[�:e��	|^��^����`�2�xf��n�X�0��F�D�?m�+{kR�!S�X;{���dۖE�,�YG�h�|���)G��#Y(���eBH��hIbq%��>q+;H�he��V�*����D��r��I����TcG�:�P䚭:�W(��ڑ=���^t/����� B[��&�U1R)f
F��jRUŋ�^�K@V�tI~�5��BI�g��kL�M���� Q*����BG}D(����m��4���I��卛:[�M���w�M���/���h�DJ����	��E҈����!���Ɨ�H��J~�^�כ���|3�>%�W"�����U�n����
�S}�S]�T�_�yb/�x}�ȦR�ċ5�x�kˑj��9'�Yh�*W7��� M*Ⱥf�&vw��5nl���E�U�;�J��*�ֳtb�W�Ķ����P�(���EI��-E*�F��7M���(U\p�?�Dc����8R�5�M��0:t��֦b;
1m��z�ͺ���K��TS����'P]G��O���HE�g�F��Xv�
z�d�a�!d��]�Ue8���3}��������Kq���_�>\=�]��DH�����m�os:A҂���~�xw��S��`�N�y7���2٧�V�J��>GF���=|D��!}w���Υ0���w���8ZbI
�7����f���y�T=4|u���A;��v�T��Na`qb`�i�f�h~ʐ�me��4$U�Cbل�L����S��皗�J�,��N ��sq6�{�������i��)J�in�1C��D2%RzrQ�������X-�7����W��������X�a֎ �kg�� �����Mo�n<����w@P�f$�~l��W%�V��F��)�P��u��WO�È�I��98��`����L�틍�M�� 
�
�OJ�ZR���A�'S���_
�p��Y��Vg����'�'�ăh��#�R���A�*�ql���<X�X��־��)�i�σ��ͩ��tR��G��=1#�x1_�O���Uq4K��u� ����<�sF�0&'��r=?� ��LwU���ΪN6pKS��j�8�e���!C�-ِRD[+�F%4�/kr�8���b�F/]���:�O�q}k�@��KG�kILB���ⲳ�t�<1�Pu���N�o��{:<[�.���xk`U��<�P�p��%,�avN�����ko(�&�U�m_�{�RW)�a[duv��6󼯮S���E��eL5�+�����"E���/Xa���,B���
(�dT����=�7�Ha4�8��Q��Ǯ    }��
�T��g!�}���,6��p9[�@��.�����Gc�1�[��_���G��n���q�xw���,�{��*�6�\bȵ�6�c0��oG®��0	��W�& fv~\�^��048�+:������-�My����=�����}򸔧fO��^z�i��2�MYE�OJ���Rג4�[�\�:%���K���q�I!ʔ�?��BQ�R��B�l��Ż�Y
	ݟ��!S�n39�f���r8Tʡ���r}r1+6�_m��U��y�nj��H]}%���n0l1`E|??Y��:��. �_��
�e�s�Rc�tҬe:�\Å���6������p�wZ�����=�7*G2�`�%o:�\-�fun�����߿ہq��\g�1M'�����&��҄�,>'�t���OW���Cfg�XmN����h�s�Q���r�$")�C�!���D8x�!7Տ���Y��@;
�Mcp���b��Q�H����p�^�C�"a�si1\�yB�J��_��]�7�Cu:��,/�����Q(�\�J�4�A(Aaq&.��|���09_BS��Zl6�n�.�d&w�k�.��%;�����0�h��d�§t� /k'�|�H�.¡u�q@�����C����YN	Uahj���ŨNY|�p>��4G�<����d�z�̲���;�Su�K�	��|����d��ˁ×n �+ڀs13��$�r�,�l�y�8�2����yt��G�G(u8C���d��`��ǝ��G������Ϲ��C�O�%�wY�,*b�0����3?,��\��C����Ѕ� �XaV]a�Y�#�&��8\�g&�_�#*�1�p����-�I����5�l�׋��Yqx���,D"A���}4��00�lD���p!���\C���AŖ!0�+�W/>�ºW�w�͢8��/{R��S�^s���`�Y�CU)_��Hh4��u+���p*(b��~O/�y]�[o�H0CDX�CM��m�G$<x�¬�����⨀?������x�y}�If[���Uf�h�P钵��������0I'�2ϲt���z,#�����h��|�`Z��#_���yB\�����4�rBFј��9�T��Q ���l����0a�"̋�2ڦ0��z�0�Mn
�K`L�F�L�	w�����]�02���Ռ��0u��
��H���05A����i_�p:	@�+��(�Q��d�?��KY`f��i�N�M���5w����o�5j}P��(��5\��$�40p��x��l:4�Y���Y���q�7��8r:���j:�5Z];���X͋�Ӽd3\u�.<q�k���ɰi��d�f�U��Շb������] �SG�b�M3�T���3�����w�����/K�A�$۴H�5�}�*�־�F��\��\��6P���aD�Y��a�� v�&.8����_Eж�H[ư�:�`�Z�*��6/�@2�YWm�����4#k�\�9���W"x�9^�Ǟ�����1�1�y�NaLN��h��WF��b!Ќ+^�zGoS�=FS����Ҽ�&��&�:r��&X�\�.�w�6m9�.��5�G��L�U����Ț�Jc���d�:��6��)r5!���+��pW��g�'~��fz�x��AD��T��Tc��]��Ƽ�f����1�d�`�ޙ�`g\w��SIܖ�̐��>�z:���d�;s�q�k��("E1l���bst���#�tV��V�Oe����im�_�"�p� ��pR�W�~�L\|�SK�-�dvF�6�@]��W�(w;��S9:\
�A8��iv��Yc(v�2\d�e*�6/�l&a3|<�ͺ͵<�?U�.�]F��:5u��#��;|�ӹ_��cg	�����r�����l]��N��֊ݬ&Ԋ��S��u�ŖG�{V�Y_��V��V�a$RtL걔g�$9ӹ^�2|LِoW˳�������}�)=B
ʐ�A�:��dwid�!s��Å�<9Y+��ڹs���}�Du���y�~��g�?����{v�P���q��[*͇͞�����D�� g�^4J��0�d�����6��-T03�n��.�p�P�R2�T����|�n[�Hl����Tx�����X�t���u�M��Z�@h=Y3�AS�Ű	5�),�}U?&�d$�*Vj�[�����>˩o^��H��$<ab��0|����k�)>�*�hJ3z޹�nˠ�d����T����6τ����P�NEY�ٌ��È�AS�#�8�\�ֱ��*5x���fg����%�>%��DSǊ찪+�5��Q`Z:1��P����}�X�����!c�$��\���+M��yt,���Mk��~:ںbjIEw�T�(�v	����˿�RЕuh�)T�9�����Ss`/A��ǳ�t>%du��"�Ȏ��2���h���h��}O����M�G���h�r�O]�}�D��wA�M�c�d/�8 ����*�:�-E�b���O(=��4����k�K6�ږ]�o����$��'C����o��F�I�pJ�7�
�7�A,�bU��ӱ(��.�	Ѡ��
��N���*�u�͎N���V�R�R���rL�g���m�ҤT�=�T�J�S8��ԙܥ�I�p]�+>V6��8��E�nS�W#��V�}9;���j�`5�̖.�3l���7��Ɓu�<_Ď��q��,ݶ��Q�*��mN��:�F ���9�mYGdXf���ݜG��
����]��k�B�Üc��&�7��(S��$oڭ�+��=sF#͠�#��F4_��W�6�|��iHNrtQO���e.^ V����(����fqq�wֵ�G��:;DĊx�rln�� +N����K�����k��[����~O6�Pą>��aG|Vċ ���1?���
�u�:�y�Ev��.�c��w	�����j��D��y⮕�O}��`��.��6�B.Nƅ���f�tQa$����庩	{Rp-6�� ��\l�?�w�z{������������h{��������?� ç��^�=���~�'��h��T�G�U~x�����⧟�n�m�@���~���O��^��/�{��
���������J~^%� �e076�،mB����a�Ms_P�?^��}*~��}��t�!\��	���D��Vu�c��������K�{��F4����<P��\���I�����6�I��|���&ҪKX��gv����8���o?>�i`�����I��i��:4h1���o��q{sU|��/�v�8>Z�Cᚩ�c�H"E2����f[��}�a��[u����k���<E7�{2�Fc�0�.�e]k��W��t���=�C 6۬h�� St���w�������4�i�;��\m��'vȋ��*�b���u��?)wB�)��W�ī����[��ۆv�����u��6�:,g\,���B!����ww�`���?����}|`�Jz�K�'��s)|�G�_����¯E����ҫ٧_�
(tY�?����c����������������b����-�������H�1>&3��t��gs6��_X�(�0R�0�T�\�}�% �-B�Z�t1�R<���ԡ�F�2��#~Bo��(چ����V	�/����v���8��}�Z�}.�^��
�e^Mr�ti�V+�=An�{燣����������k�i��!�&��ƒ�+x02�߂uX���\,�`8�S�~{S�>n?]}��8��_op�@�!7"���\�樊]�;�,���h��߶������~��6���������;���o�n�p�@��v���ⵊ�;9[����f9������-�"���qbՌ�C&5.�s:^��X��������GWN�Q2�D�����J�|��I(��3���%�Gb� �����rU��>_���ї�N��.��l��u���FxQ�񟄽��8���3ek���j�� �  r�T?do��.�h��$7��5*հe��F)��.oU�>ȱ��A���IgqU�!�,��<����*�_�<���"x�1K7r�}��;�*D9֓�����n
�JX�~|�͸������T�i�T�N�e�l�R0�f����b{���O�T�����>|�V;�n�Oi־������;�� �}��槪L�"छ;$lm����G?3=�C���O�W�����&��ti�EWeI��,[ٔ��]ƻ���]y���K���b<]�ds	���7֏���;����2�ȣ��D��T)�H��Ц̓�7���v�y��)
�eJh��V	G�Lx�������<�x�w������1ں���O���tuI��6>���2��y��wo��|�^{3�+m����3�A�;����C��"ٵ���*�v|����FvqI�e�#,�����[w�Y� ͦ�#wL�o�I �3v)ܰ��6�(���t����y�6-�*���ﺤJw/]R2Ey��Z~ɏ ���ש�z�f��نqT�ܦ����.��u:V�¯l�o���}r_,Q���Tk��"`�����Kz� ���؈��x+��90�'���.e��i������?���zx�+`q�!�\=`ǿ}�\A��e�T�K�h��ȗ#־+���%�1����o5��ۇ�����1\��Ad�8ְq�H�j6��;]޲�%�2�>~WʄK�w����rz�E������zg�h�X���"�R�X�-�����X��ck]>�'Y]�0�ڣ�v²h:E�3��]~,����߃0��N%�~�L�·�A�[Pp���b�Ϥ|�u� ߟ�q��<���ؔű�'(�]�����j��[��%�X4�0PK���c�+]�gJ6��l���zKc,g\��\?�Y=dXy�e{6��*��瘶i~��>�qt�)��se��h6��uR|n}�AAYY�%R�7|rQ4�H�Z6np���Gg/F"�|ɆlE�`g���y�>��߯�>m�8q��k��BA5�Vs"^��pIc������o�`�e��X\����u��mXҩƴ'��=9u"^0.���r}孎o||l�p,.��H�j��i:�`�i�Lv�D� �J�͐�oO/b��C�Dx��ʏ�/��oN�q��]��������SZ*^����P�-U��E
8?�;��߯�;:ڼgP,��tS�o�X�^�ͅ�4:66����\�V��(6�a��Y��!�����2��J�_R���^4EG��	�ex���Z ��ז�_���~��v{�V�5���������^n��w/����_���ǽ��W�y�!M�HMU�k[Q�z�2��ċ��X76�����W���ۏ_Q窲������=�_��}�]6�NH�u2^6$��eD6p��5�&(;i���n��*������x���������#�J��k,�����V��̻N����+5�	o��G����W<A�\��,�����d�bH�kԛ�Q�߯��av�����4�~����-� ���5\�|z��nt����8{�x�B��a���}|��#(��Ԑ?�Y4����s@,t69E���m/zx�΅F��U81[?��Ň�|c��.TQ`K�9/�x��BD�y;�p!���=4�,�-u~��NZn�S����7C�����w�Ȁ�wI_n�����_0n�C�z��K�$�R����J�1{6�����_d%_G�����&�4n^TwUT���Q��f��*~��m�\Jt�kB�Q�dJU���s$�E��������c�K
>�w8u�ף���aˀXOC�)"��t0W�Q�� ���j,-K!�Yq�^���.�Uf�2.���f��l6b���3�"���D�!���9�?-�K M�g��<����	�^"E7�4�A�*���O%ӕ��T�3�����u
!���͍���v����X��o��ō�۽I�}H\ɼ�v	(�*�Hl�h� ��-1E���Hv�#_o�S��@To����G�2����O#�e�#���&�$߅*ه�̩R/����?j�J���2�q��'^���-�BP~����kۤ��%��5bHq����I�������oo>z�i�2~rt�c�g���t�>�����M>��;�Bċ�>�q���f��V��ǯww7)N����^���������w�����]e�����ӟ�?�~��      R   =  x�mV[��:�VV��l���B�G	��$@��dVe:�����qE�TU�0t���Ɇ*ck�~�,Mr��-�׺�踆eO��m� SS/��-�1�D.+�A������V�l6�/���/߃t�F&��AHu�A�F����JO:����y#�Me5� �NU��e�[9���^�6��� ,�
�tW�X�a�����ϺU��hn���q֪DZ˝��Dh�na����.��"l�4c����������"i&��6X�)iK�'�`~��~l�E1	�I��<�ݸ����9�-&b�(*h�WE�*b~(��f�:�@?��s��-
c#��z�M�Ut��p�q�
3._�gC�Q���(�\c��@M��={T���eX�\� u*���Qw�YoYη=;�ԩX;��Wt�_ǜ'MAg4�[���1KC�W����������8��c�m%_أ3���CԸ~���J�_:�"���Zh�t)]Ƚ�uH��_B�����C��P
������7�j�\۝��c|�>�[���V��&��86-�M��أ�ګ����	��B�\8���h_�ů�	V7��-�P��&�w�9�g^��J)�) U��-5K��YH뭩�X����Koᑌ:��cur�S+�<;�?t��$��N�}X��G���`9?8lfAz1�bJ�@�q<G�'�M��F-Q���E(�ׄ�sD�b��:�P���I�!3GT'��X,Q��L�۰���#���{#"�@2=���|�����'N�G2�we&d#�Ur��ER.�nP�r�Ԩ�a����������)���=��ď�($��?���_W�0,      T   5   x�3�O,JQ��W0�BCK.#��L�.d2����L�B�0�=... S�      V   �  x�}�ˎ�0�ׇ��P��W�����M�n�a�IP�L���9��LR^�Ͽ�sS���X@�����(PE�֠
e!ȯ F#���g@�g�C�p����v���P2s
����Q��#T
�y��]��/�J(���1���������GsG�H��(�^*���c��h�F
����Q�����t�&D����9��֥\<kJ��.pvL�����2M�s���rBaD�](GT�sS�����RΌc�Lx	���ѦԼ���?ܔ�Xꉵw�+�1�I��|J�ȃ���I���a;��q3n��ը�<IRŞ��ވ݋PNH������Ф>�1��8u�N�S�<���W���r�T1�r=��m��m�z�&R����a��@�\���q�{��v��j�(�ډ4l�q�z;��r��V�l�E���)     