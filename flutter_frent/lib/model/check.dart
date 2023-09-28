import 'dart:convert';

check checkFromJson(String str) => check.fromJson(json.decode(str));

String checkToJson(check data) => json.encode(data.toJson());

class check {
  String? cERSERIAL;
  String? aPPLICIANTID;
  String? aPPLICATIONSTATUS;
  String? pAYMENTLINK;
  String? pAYMENTERROR;
  String? cERID;
  String? data;

  check(
      {this.cERSERIAL,
      this.aPPLICIANTID,
      this.aPPLICATIONSTATUS,
      this.pAYMENTLINK,
      this.pAYMENTERROR,
      this.cERID,
      this.data});

  check.fromJson(Map<String, dynamic> json) {
    cERSERIAL = json['CER_SERIAL'];
    aPPLICIANTID = json['APPLICIANT_ID'];
    aPPLICATIONSTATUS = json['APPLICATION_STATUS'];
    pAYMENTLINK = json['PAYMENT_LINK'];
    pAYMENTERROR = json['PAYMENT_ERROR'];
    cERID = json['CER_ID'];
    data = json['data'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['CER_SERIAL'] = this.cERSERIAL;
    data['APPLICIANT_ID'] = this.aPPLICIANTID;
    data['APPLICATION_STATUS'] = this.aPPLICATIONSTATUS;
    data['PAYMENT_LINK'] = this.pAYMENTLINK;
    data['PAYMENT_ERROR'] = this.pAYMENTERROR;
    data['CER_ID'] = this.cERID;
    data['data'] = this.data;
    return data;
  }
}

