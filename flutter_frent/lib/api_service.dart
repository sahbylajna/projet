import 'dart:developer';
import 'dart:convert';


import 'package:tasareeh/model/Demande.dart';
import 'package:tasareeh/model/count.dart';
import 'package:tasareeh/model/success.dart';
import 'package:tasareeh/model/token.dart';
import 'package:tasareeh/model/user.dart';
import 'package:http/http.dart' as http;
import 'package:tasareeh/constants.dart';
import 'package:tasareeh/model/contrie.dart';
import 'package:shared_preferences/shared_preferences.dart';


import 'model/term.dart';



class ApiService {
  get context => null;

  Future<List<Contries>?> getcontries() async {

    try {
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.contries);
      var response = await http.get(url);

      if (response.statusCode == 200) {
        List<Contries> model = contriesFromJson(response.body);
        print('dd');
        return model;
      }
    } catch (e) {
      log(e.toString());
    }
    return null;
  }



   Future<Token?> login(phone,password,contry) async {
    try {
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.login);
      var response = await http.post(url,
    headers: <String, String>{
      'Content-Type': 'application/json; charset=UTF-8',
    },
    body: jsonEncode(<String, String>{
      'phone': phone,
      'password': password,
      'contry_id': contry,
    }),
    );
      if (response.statusCode == 200) {
        Token model = tokenFromJson(response.body);
        return model;
      }
    } catch (e) {
      log(e.toString());
    }
    return null;
  }


  Future<User?> getuser() async {
    try {
        final user = await SharedPreferences.getInstance();
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.user);
      var response = await http.get(url,
    headers: <String, String>{
      "Accept": "application/json",
      'Authorization' : 'Bearer ${user.getString('token')}',
    },

    );
      if (response.statusCode == 200) {
        User model = userFromJson(response.body);
         user.setString('phone',model.phone);
         user.setString('first_name',model.firstName);
         user.setString('last_name',model.lastName);
         user.setString('email',model.email);
         user.setString('ud',model.ud);

         user.setInt('contry_id',model.contryId);


        return model;
      }
    } catch (e) {
      log(e.toString());
    }
    return null;
  }


Future<term?> getterm() async {
    try {

      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.term);
      var response = await http.get(url,
    headers: <String, String>{
      "Accept": "application/json",

    },

    );
      if (response.statusCode == 200) {
        term model = termFromJson(response.body);



        return model;
      }
    } catch (e) {
      log(e.toString());
    }
    return null;
  }


  Future<Success?> register(String firstName, String lastName, String phone, String password, String email, String ud, String contryId, String photoUdFrent, String photoUdBack) async {
    try {

      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.register);

      var response = await http.post(url,
       headers: <String, String>{
      'Content-Type': 'application/json',
    },
    body: jsonEncode( <String, String>{
      'first_name': firstName,
      'last_name': lastName,
      'phone': phone,
      'password': password,
      'email':email,
      'ud': ud,
      'contry_id': contryId,
      'photo_ud_frent': photoUdFrent,
      'photo_ud_back': photoUdBack.toString(),
    }),
    );

      if (response.statusCode == 200) {
        Success model = successFromJson(response.body);
        log(model.toString());
        return model;
      }
       log('e.toString()1h');
    } catch (e) {
        print(e);

    }
    return null;
  }




   Future<Success?> signature(signature,id) async {
    try {
      var url = Uri.parse("${ApiConstants.baseUrl}${ApiConstants.signature}/"+id);
      print(url);
      var response = await http.post(url,
    headers: <String, String>{
      'Content-Type': 'application/json; charset=UTF-8',
    },
    body: jsonEncode(<String, String>{
      'signature': signature,

    }),
    );
      if (response.statusCode == 200) {
        Success model = successFromJson(response.body);
        return model;
      }
    } catch (e) {
        print(e.toString());
      log(e.toString());
    }
    return null;
  }






  Future<Success?> confiramtion(code,id) async {
    try {
      var url = Uri.parse("${ApiConstants.baseUrl}${ApiConstants.confiramtion}/"+id);
      print(url);
      var response = await http.post(url,
    headers: <String, String>{
      'Content-Type': 'application/json; charset=UTF-8',
    },
    body: jsonEncode(<String, String>{
      'code': code,

    }),
    );
      if (response.statusCode == 200) {
        Success model = successFromJson(response.body);
        return model;
      }
    } catch (e) {
        print(e.toString());
      log(e.toString());
    }
    return null;
  }





  Future<count?> getcount() async {
    try {
         final user = await SharedPreferences.getInstance();
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.getcount);
      var response = await http.get(url,
    headers: <String, String>{
      'Content-Type': 'application/json; charset=UTF-8',
       'Authorization' : 'Bearer ${user.getString('token')}',
    });

      if (response.statusCode == 200) {
        count model = countFromJson(response.body);
        print(model.importations);
        return model;
      }
    } catch (e) {
      log(e.toString());
    }
    return null;
  }




  Future<List<Demande>?> getlist() async {
    try {
         final user = await SharedPreferences.getInstance();
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.getlist);
      var response = await http.get(url,
    headers: <String, String>{
      'Content-Type': 'application/json; charset=UTF-8',
       'Authorization' : 'Bearer ${user.getString('token')}',
    });

      if (response.statusCode == 200) {
        List<Demande> model = DemandeFromJson(response.body);
        return model;
      }
    } catch (e) {
      log(e.toString());
    }
    return null;
  }




  Future<Success?> Setimportations(COMP_ID,EUSER_QID,EXP_NAME,EXP_TEL,EXP_QID,EXP_FAX,EXP_COUNTRY,IMP_NAME,IMP_ADDRESS,IMP_FAX,IMP_TEL,IMP_POBOX,IMP_COUNTRY,ORIGIN_COUNTRY,SHIPPING_PLACE,ENTERY_PORT,EXPECTED_ARRIVAL_DATE,TRANSPORT,SHIPPING_DATE,EXP_NATIONALITY,EXP_PASSPORT_NUM,ANIMAL_INFO) async {
    try {
      final user = await SharedPreferences.getInstance();
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.importations);
      final Map<String, dynamic> requestData = {
        'COMP_ID': COMP_ID,
        'EUSER_QID': EUSER_QID,
        'EXP_NAME': EXP_NAME,
        'EXP_TEL': EXP_TEL,
        'EXP_QID': EXP_QID,
        'EXP_FAX': EXP_FAX,
        'EXP_COUNTRY': EXP_COUNTRY,
        'IMP_NAME': IMP_NAME,
        'IMP_ADDRESS': IMP_ADDRESS,
        'IMP_FAX': IMP_FAX,
        'IMP_TEL': IMP_TEL,
        'IMP_POBOX': IMP_POBOX,
        'IMP_COUNTRY': IMP_COUNTRY,
        'ORIGIN_COUNTRY': ORIGIN_COUNTRY,
        'SHIPPING_PLACE': SHIPPING_PLACE,
        'ENTERY_PORT': ENTERY_PORT,
        'EXPECTED_ARRIVAL_DATE': EXPECTED_ARRIVAL_DATE,
        'TRANSPORT': TRANSPORT,
        'SHIPPING_DATE': SHIPPING_DATE,
        'EXP_NATIONALITY': EXP_NATIONALITY,
        'EXP_PASSPORT_NUM': EXP_PASSPORT_NUM,
        'animal': ANIMAL_INFO,
      };

      var response = await http.post(url,
        headers: <String, String>{
          "Accept": "application/json",
          'Authorization' : 'Bearer ${user.getString('token')}',
          'Content-Type': 'application/json',
        },
        body: jsonEncode(requestData),

      );

      print(requestData);

      print('hnaaaaaaaaaaaaaaaaaaaaaa');
      print(response.body.toString());
      if (response.statusCode == 200) {

        Success model = successFromJson(response.body);
        return model;
      }

    } catch (e) {
      log(e.toString());
    }
    return null;
  }






  Future<Success?> Setbacks(COMP_ID,EUSER_QID,EXP_NAME,EXP_TEL,EXP_QID,EXP_FAX,EXP_COUNTRY,IMP_NAME,IMP_ADDRESS,IMP_FAX,IMP_TEL,IMP_POBOX,IMP_COUNTRY,ORIGIN_COUNTRY,SHIPPING_PLACE,ENTERY_PORT,EXPECTED_ARRIVAL_DATE,TRANSPORT,SHIPPING_DATE,EXP_NATIONALITY,EXP_PASSPORT_NUM,ANIMAL_INFO) async {
    try {
      final user = await SharedPreferences.getInstance();
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.backs);
      final Map<String, dynamic> requestData = {
        'COMP_ID': COMP_ID,
        'EUSER_QID': EUSER_QID,
        'EXP_NAME': EXP_NAME,
        'EXP_TEL': EXP_TEL,
        'EXP_QID': EXP_QID,
        'EXP_FAX': EXP_FAX,
        'EXP_COUNTRY': EXP_COUNTRY,
        'IMP_NAME': IMP_NAME,
        'IMP_ADDRESS': IMP_ADDRESS,
        'IMP_FAX': IMP_FAX,
        'IMP_TEL': IMP_TEL,
        'IMP_POBOX': IMP_POBOX,
        'IMP_COUNTRY': IMP_COUNTRY,
        'ORIGIN_COUNTRY': ORIGIN_COUNTRY,
        'SHIPPING_PLACE': SHIPPING_PLACE,
        'ENTERY_PORT': ENTERY_PORT,
        'EXPECTED_ARRIVAL_DATE': EXPECTED_ARRIVAL_DATE,
        'TRANSPORT': TRANSPORT,
        'SHIPPING_DATE': SHIPPING_DATE,
        'EXP_NATIONALITY': EXP_NATIONALITY,
        'EXP_PASSPORT_NUM': EXP_PASSPORT_NUM,
        'animal': ANIMAL_INFO,
      };

      var response = await http.post(url,
        headers: <String, String>{
          "Accept": "application/json",
          'Authorization' : 'Bearer ${user.getString('token')}',
          'Content-Type': 'application/json',
        },
        body: jsonEncode(requestData),

      );

      print(requestData);

      print('hnaaaaaaaaaaaaaaaaaaaaaa');
      print(response.body.toString());
      if (response.statusCode == 200) {

        Success model = successFromJson(response.body);
        return model;
      }

    } catch (e) {
      log(e.toString());
    }
    return null;
  }



  Future<Success?> Setexports(COMP_ID,EUSER_QID,EXP_NAME,EXP_TEL,EXP_QID,EXP_FAX,EXP_COUNTRY,IMP_NAME,IMP_FAX,IMP_TEL,IMP_COUNTRY,ORIGIN_COUNTRY,SHIPPING_PLACE,TRANSPORT,SHIPPING_DATE,EXP_NATIONALITY,EXP_PASSPORT_NUM,ANIMAL_INFO) async {
    try {
      final user = await SharedPreferences.getInstance();
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.exports);
      final Map<String, dynamic> requestData = {
        'COMP_ID': COMP_ID,
        'EUSER_QID': EUSER_QID,
        'EXP_NAME': EXP_NAME,
        'EXP_TEL': EXP_TEL,
        'IMP_QID': EXP_QID,
        'EXP_FAX': EXP_FAX,
        'EXP_COUNTRY': EXP_COUNTRY,
        'IMP_NAME': IMP_NAME,

        'IMP_FAX': IMP_FAX,
        'IMP_TEL': IMP_TEL,

        'IMP_COUNTRY': IMP_COUNTRY,
        'ORIGIN_COUNTRY': ORIGIN_COUNTRY,
        'SHIPPING_PLACE': SHIPPING_PLACE,


        'TRANSPORT': TRANSPORT,
        'SHIPPING_DATE': SHIPPING_DATE,
        'EXP_NATIONALITY': EXP_NATIONALITY,
        'EXP_PASSPORT_NUM': EXP_PASSPORT_NUM,
        'animal': ANIMAL_INFO,
      };

      var response = await http.post(url,
        headers: <String, String>{
          "Accept": "application/json",
          'Authorization' : 'Bearer ${user.getString('token')}',
          'Content-Type': 'application/json',
        },
        body: jsonEncode(requestData),

      );

      print(requestData);


      print(response.body.toString());
      if (response.statusCode == 200) {

        Success model = successFromJson(response.body);
        return model;
      }

    } catch (e) {
      log(e.toString());
    }
    return null;
  }




















}
