package com.example.api.features.items.createitem;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.web.servlet.AutoConfigureMockMvc;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.http.MediaType;
import org.springframework.test.web.servlet.MockMvc;

import static org.springframework.test.web.servlet.request.MockMvcRequestBuilders.post;
import static org.springframework.test.web.servlet.result.MockMvcResultMatchers.*;

@SpringBootTest
@AutoConfigureMockMvc
public class CreateItemControllerTest {

    @Autowired
    private MockMvc mockMvc;

    @Test
    void handle_ValidPayload_ReturnsCreated() throws Exception {
        String jsonPayload = """
            {
                "name": "Test Item",
                "price": 29.99,
                "description": "Sample description"
            }
            """;

        mockMvc.perform(post("/api/items")
                .contentType(MediaType.APPLICATION_JSON)
                .content(jsonPayload))
                .andExpect(status().isCreated())
                .andExpect(jsonPath("$.name").value("Test Item"))
                .andExpect(jsonPath("$.price").value(29.99));
    }

    @Test
    void handle_InvalidPrice_ReturnsBadRequest() throws Exception {
        String jsonPayload = """
            {
                "name": "Test Item",
                "price": -5.00
            }
            """;

        mockMvc.perform(post("/api/items")
                .contentType(MediaType.APPLICATION_JSON)
                .content(jsonPayload))
                .andExpect(status().isBadRequest());
    }
}