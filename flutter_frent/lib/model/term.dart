import 'dart:convert';
term termFromJson(String str) => term.fromJson(json.decode(str));

String termToJson(term data) => json.encode(data.toJson());
class term {
  String? termAr;
  String? termEn;

  term({this.termAr, this.termEn});

  term.fromJson(Map<String, dynamic> json) {
    termAr = json['term_ar'];
    termEn = json['term_en'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['term_ar'] = termAr;
    data['term_en'] = termEn;
    return data;
  }
}
