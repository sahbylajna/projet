
import 'dart:convert';

import 'package:tasareeh/model/Animal.dart';

List<Demande> DemandeFromJson(String str) => List<Demande>.from(json.decode(str).map((x) => Demande.fromJson(x)));

String DemandeToJson(List<Demande> data) => json.encode(List<dynamic>.from(data.map((x) => x.toJson())));
class Demande {
  int? id;
  String? createdAt;
  String? updatedAt;
  int? clientId;
  String? cERTYPE;
  String? cERLANG;
  String? cOMPID;
  String? eUSERQID;
  String? eXPNAME;
  String? eXPTEL;
  String? eXPFAX;
  String? eXPCOUNTRY;
  String? iMPNAME;
  String? iMPQID;
  String? iMPFAX;
  String? iMPTEL;
  String? iMPCOUNTRY;
  String? oRIGINCOUNTRY;
  String? sHIPPINGPLACE;
  String? tRANSPORT;
  String? sHIPPINGDATE;
  String? aPPLICANTNAME;
  String? aPPLICANTTEL;
  String? eXPNATIONALITY;
  String? eXPPASSPORTNUM;
  String? accepted;
  String? reson;
  String? type;
  List<Animal>? animal;

  Demande(
      {this.id,
      this.createdAt,
      this.updatedAt,
      this.clientId,
      this.cERTYPE,
      this.cERLANG,
      this.cOMPID,
      this.eUSERQID,
      this.eXPNAME,
      this.eXPTEL,
      this.eXPFAX,
      this.eXPCOUNTRY,
      this.iMPNAME,
      this.iMPQID,
      this.iMPFAX,
      this.iMPTEL,
      this.iMPCOUNTRY,
      this.oRIGINCOUNTRY,
      this.sHIPPINGPLACE,
      this.tRANSPORT,
      this.sHIPPINGDATE,
      this.aPPLICANTNAME,
      this.aPPLICANTTEL,
      this.eXPNATIONALITY,
      this.eXPPASSPORTNUM,
      this.accepted,
      this.reson,
      this.type,
      this.animal});

  Demande.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    createdAt = json['created_at'];
    updatedAt = json['updated_at'];
    clientId = json['client_id'];
    cERTYPE = json['CER_TYPE'];
    cERLANG = json['CER_LANG'];
    cOMPID = json['COMP_ID'];
    eUSERQID = json['EUSER_QID'];
    eXPNAME = json['EXP_NAME'];
    eXPTEL = json['EXP_TEL'];
    eXPFAX = json['EXP_FAX'];
    eXPCOUNTRY = json['EXP_COUNTRY'];
    iMPNAME = json['IMP_NAME'];
    iMPQID = json['IMP_QID'];
    iMPFAX = json['IMP_FAX'];
    iMPTEL = json['IMP_TEL'];
    iMPCOUNTRY = json['IMP_COUNTRY'];
    oRIGINCOUNTRY = json['ORIGIN_COUNTRY'];
    sHIPPINGPLACE = json['SHIPPING_PLACE'];
    tRANSPORT = json['TRANSPORT'];
    sHIPPINGDATE = json['SHIPPING_DATE'];
    aPPLICANTNAME = json['APPLICANT_NAME'];
    aPPLICANTTEL = json['APPLICANT_TEL'];
    eXPNATIONALITY = json['EXP_NATIONALITY'];
    eXPPASSPORTNUM = json['EXP_PASSPORT_NUM'];
    accepted = json['accepted'];
    reson = json['reson'];
    type = json['type'];
    if (json['animal'] != null) {
      animal = <Animal>[];
      json['animal'].forEach((v) {
        animal!.add(Animal.fromJson(v));
      });
    }
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['created_at'] = createdAt;
    data['updated_at'] = updatedAt;
    data['client_id'] = clientId;
    data['CER_TYPE'] = cERTYPE;
    data['CER_LANG'] = cERLANG;
    data['COMP_ID'] = cOMPID;
    data['EUSER_QID'] = eUSERQID;
    data['EXP_NAME'] = eXPNAME;
    data['EXP_TEL'] = eXPTEL;
    data['EXP_FAX'] = eXPFAX;
    data['EXP_COUNTRY'] = eXPCOUNTRY;
    data['IMP_NAME'] = iMPNAME;
    data['IMP_QID'] = iMPQID;
    data['IMP_FAX'] = iMPFAX;
    data['IMP_TEL'] = iMPTEL;
    data['IMP_COUNTRY'] = iMPCOUNTRY;
    data['ORIGIN_COUNTRY'] = oRIGINCOUNTRY;
    data['SHIPPING_PLACE'] = sHIPPINGPLACE;
    data['TRANSPORT'] = tRANSPORT;
    data['SHIPPING_DATE'] = sHIPPINGDATE;
    data['APPLICANT_NAME'] = aPPLICANTNAME;
    data['APPLICANT_TEL'] = aPPLICANTTEL;
    data['EXP_NATIONALITY'] = eXPNATIONALITY;
    data['EXP_PASSPORT_NUM'] = eXPPASSPORTNUM;
    data['accepted'] = accepted;
    data['reson'] = reson;
    data['type'] = type;
    if (animal != null) {
      data['animal'] = animal!.map((v) => v.toJson()).toList();
    }
    return data;
  }
}
