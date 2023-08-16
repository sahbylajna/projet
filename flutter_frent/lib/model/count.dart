import 'dart:convert';

count countFromJson(String str) => count.fromJson(json.decode(str));

String countToJson(count data) => json.encode(data.toJson());

class count {
  int? exports;
  int? importations;
  int? backs;

  count({this.exports, this.importations, this.backs});

  count.fromJson(Map<String, dynamic> json) {
    exports = json['exports'];
    importations = json['importations'];
    backs = json['backs'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['exports'] = this.exports;
    data['importations'] = this.importations;
    data['backs'] = this.backs;
    return data;
  }
}
