// To parse this JSON data, do
//
//     final user = userFromJson(jsonString);

import 'dart:convert';

User userFromJson(String str) => User.fromJson(json.decode(str));

String userToJson(User data) => json.encode(data.toJson());

class User {
    int id;
    DateTime createdAt;
    DateTime updatedAt;
    String firstName;
    String lastName;
    String phone;
    String email;
    String ud;
    String photoUdFrent;
    String photoUdBack;
    int contryId;
    String accepted;
    dynamic refused;
    dynamic deletedAt;
    String singateur;
    String code;
    String virification;

    User({
        required this.id,
        required this.createdAt,
        required this.updatedAt,
        required this.firstName,
        required this.lastName,
        required this.phone,
        required this.email,
        required this.ud,
        required this.photoUdFrent,
        required this.photoUdBack,
        required this.contryId,
        required this.accepted,
        this.refused,
        this.deletedAt,
        required this.singateur,
        required this.code,
        required this.virification,
    });

    factory User.fromJson(Map<String, dynamic> json) => User(
        id: json["id"],
        createdAt: DateTime.parse(json["created_at"]),
        updatedAt: DateTime.parse(json["updated_at"]),
        firstName: json["first_name"],
        lastName: json["last_name"],
        phone: json["phone"],
        email: json["email"],
        ud: json["ud"],
        photoUdFrent: json["photo_ud_frent"],
        photoUdBack: json["photo_ud_back"],
        contryId: json["contry_id"],
        accepted: json["accepted"],
        refused: json["refused"],
        deletedAt: json["deleted_at"],
        singateur: json["singateur"],
        code: json["code"],
        virification: json["virification"],
    );

    Map<String, dynamic> toJson() => {
        "id": id,
        "created_at": createdAt.toIso8601String(),
        "updated_at": updatedAt.toIso8601String(),
        "first_name": firstName,
        "last_name": lastName,
        "phone": phone,
        "email": email,
        "ud": ud,
        "photo_ud_frent": photoUdFrent,
        "photo_ud_back": photoUdBack,
        "contry_id": contryId,
        "accepted": accepted,
        "refused": refused,
        "deleted_at": deletedAt,
        "singateur": singateur,
        "code": code,
        "virification": virification,
    };
}
