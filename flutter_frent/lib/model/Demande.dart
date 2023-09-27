
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
  String? eXPQID;
  String? eXPFAX;
  String? eXPCOUNTRY;
  String? iMPNAME;
  String? iMPADDRESS;
  String? iMPQID;
  String? iMPFAX;
  String? iMPTEL;
  String? iMPPOBOX;
  String? iMPCOUNTRY;
  String? oRIGINCOUNTRY;
  String? sHIPPINGPLACE;
  String? eNTERYPORT;
  String? eXPECTEDARRIVALDATE;
  String? tRANSPORT;
  String? sHIPPINGDATE;
  String? aPPLICANTNAME;
  String? aPPLICANTTEL;
  String? eXPNATIONALITY;
  String? eXPPASSPORTNUM;
  String? accepted;

  String? type;
  String? reson;
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
        this.eXPQID,
        this.eXPFAX,
        this.eXPCOUNTRY,
        this.iMPNAME,
        this.iMPADDRESS,
        this.iMPQID,
        this.iMPFAX,
        this.iMPTEL,
        this.iMPPOBOX,
        this.iMPCOUNTRY,
        this.oRIGINCOUNTRY,
        this.sHIPPINGPLACE,
        this.eNTERYPORT,
        this.eXPECTEDARRIVALDATE,
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
    eXPQID = json['EXP_QID'];
    eXPFAX = json['EXP_FAX'];
    eXPCOUNTRY = json['EXP_COUNTRY'];
    iMPNAME = json['IMP_NAME'];
    iMPADDRESS = json['IMP_ADDRESS'];
    iMPQID = json['IMP_QID'];
    iMPFAX = json['IMP_FAX'];
    iMPTEL = json['IMP_TEL'];
    iMPPOBOX = json['IMP_POBOX'];
    iMPCOUNTRY = json['IMP_COUNTRY'];
    oRIGINCOUNTRY = json['ORIGIN_COUNTRY'];
    sHIPPINGPLACE = json['SHIPPING_PLACE'];
    eNTERYPORT = json['ENTERY_PORT'];
    eXPECTEDARRIVALDATE = json['EXPECTED_ARRIVAL_DATE'];
    tRANSPORT = json['TRANSPORT'];
    sHIPPINGDATE = json['SHIPPING_DATE'];
    aPPLICANTNAME = json['APPLICANT_NAME'];
    aPPLICANTTEL = json['APPLICANT_TEL'];
    eXPNATIONALITY = json['EXP_NATIONALITY'];
    eXPPASSPORTNUM = json['EXP_PASSPORT_NUM'];

 reson = json['reson'];
    type = json['type'];

  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['id'] = this.id;
    data['created_at'] = this.createdAt;
    data['updated_at'] = this.updatedAt;
    data['client_id'] = this.clientId;
    data['CER_TYPE'] = this.cERTYPE;
    data['CER_LANG'] = this.cERLANG;
    data['COMP_ID'] = this.cOMPID;
    data['EUSER_QID'] = this.eUSERQID;
    data['EXP_NAME'] = this.eXPNAME;
    data['EXP_TEL'] = this.eXPTEL;
    data['EXP_QID'] = this.eXPQID;
    data['EXP_FAX'] = this.eXPFAX;
    data['EXP_COUNTRY'] = this.eXPCOUNTRY;
    data['IMP_NAME'] = this.iMPNAME;
    data['IMP_ADDRESS'] = this.iMPADDRESS;
    data['IMP_QID'] = this.iMPQID;
    data['IMP_FAX'] = this.iMPFAX;
    data['IMP_TEL'] = this.iMPTEL;
    data['IMP_POBOX'] = this.iMPPOBOX;
    data['IMP_COUNTRY'] = this.iMPCOUNTRY;
    data['ORIGIN_COUNTRY'] = this.oRIGINCOUNTRY;
    data['SHIPPING_PLACE'] = this.sHIPPINGPLACE;
    data['ENTERY_PORT'] = this.eNTERYPORT;
    data['EXPECTED_ARRIVAL_DATE'] = this.eXPECTEDARRIVALDATE;
    data['TRANSPORT'] = this.tRANSPORT;
    data['SHIPPING_DATE'] = this.sHIPPINGDATE;
    data['APPLICANT_NAME'] = this.aPPLICANTNAME;
    data['APPLICANT_TEL'] = this.aPPLICANTTEL;
    data['EXP_NATIONALITY'] = this.eXPNATIONALITY;
    data['EXP_PASSPORT_NUM'] = this.eXPPASSPORTNUM;
    data['accepted'] = this.accepted;
data['reson'] = this.reson;
    data['type'] = this.type;

    return data;
  }
}

