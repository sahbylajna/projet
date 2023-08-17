import 'dart:developer';
import 'dart:convert';


import 'package:flutter_frent/model/Demande.dart';
import 'package:flutter_frent/model/count.dart';
import 'package:flutter_frent/model/success.dart';
import 'package:flutter_frent/model/token.dart';
import 'package:flutter_frent/model/user.dart';
import 'package:http/http.dart' as http;
import 'package:flutter_frent/constants.dart';
import 'package:flutter_frent/model/contrie.dart';
import 'package:shared_preferences/shared_preferences.dart';


import 'model/term.dart';



class ApiService {
  get context => null;

  Future<List<Contries>?> getcontries() async {
    try {
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.contries);
      var response = await http.get(url);
      if (response.statusCode == 200) {
        List<Contries> _model = contriesFromJson(response.body);
        return _model;
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
        Token _model = tokenFromJson(response.body);
        return _model;
      }
    } catch (e) {
      log(e.toString());
    }
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
        User _model = userFromJson(response.body);
         user.setString('phone',_model.phone);
         user.setString('first_name',_model.firstName);
         user.setString('last_name',_model.lastName);
         user.setString('email',_model.email);
         user.setString('ud',_model.ud);

         user.setInt('contry_id',_model.contryId);


        return _model;
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
        term _model = termFromJson(response.body);



        return _model;
      }
    } catch (e) {
      log(e.toString());
    }
    return null;
  }


  Future<Success?> register(String first_name, String last_name, String phone, String password, String email, String ud, String contry_id, String photo_ud_frent, String photo_ud_back) async {
    try {

      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.register);

      var response = await http.post(url,
       headers: <String, String>{
      'Content-Type': 'application/json',
    },
    body: jsonEncode( <String, String>{
      'first_name': first_name,
      'last_name': last_name,
      'phone': phone,
      'password': password,
      'email':email,
      'ud': ud,
      'contry_id': contry_id,
      'photo_ud_frent': photo_ud_frent,
      'photo_ud_back': photo_ud_back.toString(),
    }),
    );

      if (response.statusCode == 200) {
        Success _model = successFromJson(response.body);
        log(_model.toString());
        return _model;
      }
       log('e.toString()1h');
    } catch (e) {
        print(e);

    }
  }




   Future<Success?> signature(signature,id) async {
    try {
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.signature+ "/"+id);
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
        Success _model = successFromJson(response.body);
        return _model;
      }
    } catch (e) {
        print(e.toString());
      log(e.toString());
    }
  }






  Future<Success?> confiramtion(code,id) async {
    try {
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.confiramtion+ "/"+id);
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
        Success _model = successFromJson(response.body);
        return _model;
      }
    } catch (e) {
        print(e.toString());
      log(e.toString());
    }
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
        count _model = countFromJson(response.body);
        return _model;
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
        List<Demande> _model = DemandeFromJson(response.body);
        return _model;
      }
    } catch (e) {
      log(e.toString());
    }
    return null;
  }
























}
