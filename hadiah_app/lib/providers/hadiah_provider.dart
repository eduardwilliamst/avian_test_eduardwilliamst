import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import '../models/hadiah.dart';

class HadiahProvider with ChangeNotifier {
  List<Hadiah> _hadiahList = [];

  List<Hadiah> get hadiahList => _hadiahList;

  final String apiUrl = 'http://127.0.0.1:8000/api/hadiah';

  Future<void> fetchHadiah() async {
    try {
      final response = await http.get(Uri.parse(apiUrl));
      if (response.statusCode == 200) {
        final List<dynamic> extractedData = json.decode(response.body);
        _hadiahList = extractedData.map((data) => Hadiah.fromJson(data)).toList();
        notifyListeners();
      } else {
        throw Exception('Failed to load data');
      }
    } catch (error) {
      throw error;
    }
  }

  Future<void> updateHadiahStatus(int id, bool received, String reason) async {
    final url = '$apiUrl/$id';
    try {
      final response = await http.put(
        Uri.parse(url),
        headers: {'Content-Type': 'application/json'},
        body: json.encode({
          'received': received,
          'failed_reason': reason,
        }),
      );
      if (response.statusCode == 200) {
        fetchHadiah();
      } else {
        throw Exception('Failed to update data');
      }
    } catch (error) {
      throw error;
    }
  }
}
